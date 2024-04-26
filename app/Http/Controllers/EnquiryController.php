<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;
use App\Http\Requests;
use App\User;
use App\Enquiry;
use App\EnquiyFollowup;
use App\SmsIntegrationModel;
use DB;
use Auth;
use PDF;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;
use Mail;

class EnquiryController extends Controller
{
    private $activities;
	protected $foo;
	public function __construct(Foo $foo){		 
	   $this->foo = $foo;
    }

    public function sendsms($cust_contact, $sms_user_name,$sms_password,$sms_sender_id,$smsBody){
        $smsBody = urlencode($smsBody);
        $url = "http://sms.puretechnology.in/api/mt/SendSMS?user=$sms_user_name&password=$sms_password&senderid=$sms_sender_id&channel=Trans&DCS=0&flashsms=0&number=$cust_contact&text=$smsBody&route=06";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return  $response;
    }
    
    public function homeEnquiry(){
        $enqCnId = DB::table('tbl_enquiry')->select('enq_id','cn_no')->orderBy('enq_id', 'desc')->take(1)->get();
        foreach($enqCnId as $enqCnIdData){
            $enqId=$enqCnIdData->enq_id;
            $cnId=$enqCnIdData->cn_no;
        }
        if(isset($cnId)){
            $result = substr($cnId, 0, 8);
            if($result == date("Ymd")){ $cnId=$cnId+1;}else{ $cnId=date("Ymd")."1";}
        }else{
            $cnId=date("Ymd")."1";
        }

        if(empty($enqId)){ $enqId=0;}
        $allEnquiryList = DB::table('tbl_enquiry')->select('*')->where("isdelete","0")->orderBy('enq_id', 'desc')->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('enquiry.addEnquiryForm',compact('enqId','cnId','allEnquiryList','goodsRS','sourceRS','statusRS'));
    }

    public function adddashboardEnquiry(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'good_types' => 'required',
            'cust_name' => 'required',
            'reference_status' => 'required',
            'reference' => 'required',
            'cust_email' => 'required',
            'cust_contact' => 'required|digits:10|min:10|max:11',
            // 'cust_alternate_no' => 'digits:10|min:10|max:11',
            'source' => 'required',
            'destination' => 'required',
            'exp_shifting_date' => 'required'
        ],[
            'good_types.required' => 'Good type is required.',
            'cust_name.required' => 'Customer name is required.',
            'reference_status.required' => 'Lead Status is required.',
            'reference.required' => 'Lead Source is required.',
            'cust_email.required' => 'Customer email ID is required.',
            'cust_contact.required' => 'Customer Contact No is required.',
            'cust_contact.min' => 'Contact no required minimum 10 Digit.',
            'cust_contact.max' => 'Contact no required maximum 10 Digit.',
            // 'cust_alternate_no.min' => 'Alternate contact no required minimum 10 Digit.',
            // 'cust_alternate_no.max' => 'Alternate contact no required maximum 10 Digit.',
            'source.required' => 'Source is required.',
            'destination.required' => 'Destination is required.',
            'exp_shifting_date.required' => 'Expected Shifting Date is required.',
        ]);
        $shiftingDate = $request->input('exp_shifting_date');
        $shiftingSource = explode(", ",$request->input('source'));
        $shiftingDestination = explode(", ",$request->input('destination'));
        $cust_name = $request->input('cust_name');
        $cust_email = $request->input('cust_email');
        $cust_contact = $request->input('cust_contact');
        $cust_alternate_no = $request->input('cust_alternate_no');
        $reference = $request->input('reference');
        $reference_status = $request->input('reference_status');
        $enquiry_type= $request->input('good_types');

        $follow_up_date = $request->input('follow_up_date');
        $follow_up_convr= $request->input('follow_up_convr');

        $enqCnId = DB::table('tbl_enquiry')->select('enq_id','cn_no')->orderBy('enq_id', 'desc')->take(1)->get();
        foreach($enqCnId as $enqCnIdData){
            $cnId=$enqCnIdData->cn_no;
        }
//        print_r($enqCnId);die;
        if(isset($cnId)){
            $result = substr($cnId, 0, 8);
            $count = strlen($cnId);
            $temp_var = 8-$count;
            $result2 = substr($cnId, $temp_var);
            if($result == date("Ymd")){ $cnId=$result.($result2+1);}else{ $cnId=date("Ymd")."1";}
        }else{
            $cnId=date("Ymd")."1";
        }
//echo $cnId;die;

        $data=array(
            "cn_no"=>$cnId,
            "source"=>$shiftingSource[0],
            "destination"=>$shiftingDestination[0],
            "cust_name"=>$cust_name,
            "cust_email"=>$cust_email,
            "cust_contact"=>$cust_contact,
            "cust_alt_contact"=>$cust_alternate_no,
            "reference"=>$reference,
            "reference_status"=>$reference_status,
            "reference_name"=>$request->input('reference_name'),
            "reference_number"=>$request->input('reference_number'),
            "enq_status" => "New",
            "enquiry_type"=>$enquiry_type,
            "exp_shifting_date"=>date("Y-m-d",strtotime($shiftingDate)),
//            "follow_up" => $follow_up,
            "follow_up_date"=>date("Y-m-d",strtotime($follow_up_date)),
            "follow_up_convr"=>$follow_up_convr,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'isdelete' => 0
        );

        if(Enquiry::create($data)){
            $last_eq_id = DB::getPdo()->lastInsertId();

            $data=array(
                "cn_no"=>$request->input('consignment_no'),
                "enq_id"=>$last_eq_id,
                "followup_date"=>date("Y-m-d",strtotime($follow_up_date)),
                "conversation"=>$follow_up_convr
            );
            EnquiyFollowup::create($data);

//            $co_no= date("Ymd").$last_eq_id;
//            DB::table('tbl_enquiry')
//                ->where('enq_id', $last_eq_id)
//                ->update(['cn_no' => $co_no]);
            $message = 'Record Inserted Successfully.';

            $smsIntrs = DB::table('tbl_sms_integration')->get();
            foreach($smsIntrs as $smsIntData){
                $sms_user_name=$smsIntData->user_name;
                $sms_password= $smsIntData->password;
                $sms_sender_id=$smsIntData->sender_id;

            }
            //sms to the customer
            $smsBodyrs = DB::table('tbl_sms_template')->select("sms_body")->where("sms_for",'Add enquiry to customer')->get();
            $co_no= date("Ymd").$last_eq_id;
            foreach($smsBodyrs as $smsdate){
                $smsbody=$smsdate->sms_body;
                eval("\$smsbody = \"$smsbody\";");
            }
//            $smsBody = "Thanks for contacting Safemove Packers & Movers. Your enquiry no is ".$co_no.".We have sent you an email with some useful links. Please call us at 073-7771-7771 if you have any queries.";
            $this->sendsms($cust_contact, $sms_user_name,$sms_password,$sms_sender_id,$smsbody);

            $to_name = $cust_name;
            $to_email = $cust_email;
            $emailBodyrs = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'add enquiry')->get();
            $name = ucwords($cust_name);
            $cn_no = $co_no;
            foreach($emailBodyrs as $emaildate){
                $emailbody=$emaildate->email_body;
                eval("\$emailbody = \"$emailbody\";");
            }
            $data = array("body" => $emailbody);

            Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Enquiry');
                $message->from('contact@safemove.in','Safemove');
            });

        }else{
            $message = 'Record Inserted Not Successfully.';
        }


        $enqCnId = DB::table('tbl_enquiry')->select('enq_id','cn_no')->orderBy('enq_id', 'desc')->take(1)->get();
        foreach($enqCnId as $enqCnIdData){
            $enqId=$enqCnIdData->enq_id;
            $cnId=$enqCnIdData->cn_no;
        }
        $result = substr($cnId, 0, 8);
        if($result == date("Ymd")){   $cnId=$cnId+1;}else{  $cnId=date("Ymd")."1";}
        if(empty($enqId)){ $enqId=0;}
        $allEnquiryList = DB::table('tbl_enquiry')->select('*')->where("isdelete","0")->orderBy('enq_id', 'desc')->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('enquiry.addEnquiryForm',compact('enqId','cnId','allEnquiryList','goodsRS','sourceRS','statusRS','message'));
        // return redirect('/homeEnquiry');
    }

    public function getHomeFollowup($id){
//        $cn_no =$_GET['cn_no'];
        $cn_noRs = DB::table('tbl_enquiry')->where("cn_no",$id)->get();
        $followupRs = DB::table('tbl_enquiry_followup')->where("cn_no",$id)->get();
        foreach($cn_noRs as $cn_noData){}
//        if(!empty($cn_noData)){
//            print_r($cn_noData);
//        }
        $enqCnId = DB::table('tbl_enquiry')->select('enq_id','cn_no')->orderBy('enq_id', 'desc')->take(1)->get();
        foreach($enqCnId as $enqCnIdData){
            $enqId=$enqCnIdData->enq_id;
            $cnId=$enqCnIdData->cn_no;
        }
        if(isset($cnId)){
            $result = substr($cnId, 0, 8);
            if($result == date("Ymd")){ $cnId=$cnId+1;}else{ $cnId=date("Ymd")."1";}
        }else{
            $cnId=date("Ymd")."1";
        }


        if(empty($enqId)){ $enqId=0;}
        $allEnquiryList = DB::table('tbl_enquiry')->select('*')->where("isdelete","0")->orderBy('enq_id', 'desc')->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('enquiry.addEnquiryForm',compact('enqId','cnId','allEnquiryList','goodsRS','sourceRS','statusRS','cn_noData','followupRs'));
//        $returnHTML = view('enquiry.addEnquiryForm')->with('enqId',$enqId)->render();
//        return response()->json(array('success' => true, 'html'=>$returnHTML));

    }

    //Edit enquiry function
    public function enquiryEdit($enq_id){
        $enquiryData = DB::table('tbl_enquiry')->select('*')->where('enq_id', base64_decode($enq_id))->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('enquiry.editEnquiryForm',compact('enquiryData','goodsRS','sourceRS','statusRS'));
    }

    //update Enquiry updateEnquiry
    public function updateEnquiry(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'good_types' => 'required',
            'cust_name' => 'required',
            'reference' => 'required',
            'cust_email' => 'required',
            'cust_contact' => 'required|digits:10|min:10|max:11',
            'source' => 'required',
            'destination' => 'required',
            'exp_shifting_date' => 'required'
        ],[
            'good_types.required' => 'Good type is required.',
            'cust_name.required' => 'Customer name is required.',
            'reference.required' => 'Lead Source is required.',
            'cust_email.required' => 'Customer email ID is required.',
            'cust_contact.required' => 'Customer Contact No is required.',
            'cust_contact.min' => 'Contact no required minimum 10 Digit.',
            'cust_contact.max' => 'Contact no required maximum 10 Digit.',
            // 'cust_alternate_no.min' => 'Alternate contact no required minimum 10 Digit.',
            // 'cust_alternate_no.max' => 'Alternate contact no required maximum 10 Digit.',
            'source.required' => 'Source is required.',
            'destination.required' => 'Destination is required.',
            'exp_shifting_date.required' => 'Expected Shifting Date is required.',
        ]);
        $shiftingDate = $request->input('exp_shifting_date');
        $shiftingSource = explode(", ",$request->input('source'));
        $shiftingDestination = explode(", ",$request->input('destination'));
        $cust_name = $request->input('cust_name');
        $cust_email = $request->input('cust_email');
        $cust_contact = $request->input('cust_contact');
        $cust_alternate_no = $request->input('cust_alternate_no');
        $reference = $request->input('reference');
        $reference_status = $request->input('reference_status');
        $enquiry_type= $request->input('good_types');
        $follow_up_date = $request->input('follow_up_date');
        $follow_up_convr= $request->input('follow_up_convr');

        $data=array(
            "source"=>$shiftingSource[0],
            "destination"=>$shiftingDestination[0],
            "cust_name"=>$cust_name,
            "cust_email"=>$cust_email,
            "cust_contact"=>$cust_contact,
            "cust_alt_contact"=>$cust_alternate_no,
            "reference"=>$reference,
            "reference_status"=>$reference_status,
            "enquiry_type"=>$enquiry_type,
            "exp_shifting_date"=>date("Y-m-d",strtotime($shiftingDate)),
//            "follow_up" => $follow_up,
            "follow_up_date"=>date("Y-m-d",strtotime($follow_up_date)),
            "follow_up_convr"=>$follow_up_convr,
            'updated_by' => Auth::user()->id
        );

        if(Enquiry::where('enq_id',$request->input('enq_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Not Updated Successfully.';
        }
        $enqCnId = DB::table('tbl_enquiry')->select('enq_id','cn_no')->orderBy('enq_id', 'desc')->take(1)->get();
        foreach($enqCnId as $enqCnIdData){
            $enqId=$enqCnIdData->enq_id;
            $cnId=$enqCnIdData->cn_no;
        }
        $result = substr($cnId, 0, 8);
        if($result == date("Ymd")){  $cnId=$cnId+1;}else{ $cnId=date("Ymd")."1";}
        if(empty($enqId)){ $enqId=0;}
        $allEnquiryList = DB::table('tbl_enquiry')->select('*')->where("isdelete","0")->orderBy('enq_id', 'desc')->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('enquiry.addEnquiryForm',compact('enqId','cnId','allEnquiryList','goodsRS','sourceRS','statusRS','message'));
    }

    // Delete Enquiry

    /**
     * @return mixed
     */
    public function enquiryDestroy($id){

        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(Enquiry::where('enq_id', base64_decode($id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        $enqCnId = DB::table('tbl_enquiry')->select('enq_id','cn_no')->orderBy('enq_id', 'desc')->take(1)->get();
        foreach($enqCnId as $enqCnIdData){
            $enqId=$enqCnIdData->enq_id;
            $cnId=$enqCnIdData->cn_no;
        }
        $result = substr($cnId, 0, 8);
        if($result == date("Ymd")){  $cnId=$cnId+1;}else{ $cnId=date("Ymd")."1";}
        if(empty($enqId)){ $enqId=0;}
        $allEnquiryList = DB::table('tbl_enquiry')->select('*')->where("isdelete","0")->orderBy('enq_id', 'desc')->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        $statusRS = DB::table("tbl_lead_status")->get();
        //return view('enquiry.addEnquiryForm',compact('enqId','cnId','allEnquiryList','goodsRS','sourceRS','statusRS','message'));
        return redirect('/homeEnquiry');
    }

    //Display enquiry details function
    public function enquiryDetails($enq_id){
        $enquiryrs = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*', 'tbl_enquiry.created_at as ecat','tbl_enquiry.updated_at as eupat','users1.first_name as u1fst','users1.last_name as u1lst','users2.first_name as u2fst','users1.last_name as u2lst')
//            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->join('users as users1', 'tbl_enquiry.created_by', '=', 'users1.id')
            ->join('users as users2', 'tbl_enquiry.updated_by', '=', 'users2.id')
            ->where('tbl_enquiry.enq_id', base64_decode($enq_id))
            ->get();
        foreach ($enquiryrs as $enquiryData){}
        return view('enquiry.enquiryDetailsView',compact('enquiryData'));
    }

    //Add followup data
    public function addFollowup(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'followup_cn_no' => 'required',
            'conversation' => 'required',
        ],[
            'followup_cn_no.required' => 'Consignment No is required.',
            'conversation.required' => 'Conversation is required.',
        ]);
        $cn_no = $request->input('followup_cn_no');
        $enq_id = $request->input('enquiry_id');
        $followup_date = $request->input('followup_date');
        $conversation = $request->input('conversation');
        $rating = $request->input('rating');

        $data=array(
            "cn_no"=>$cn_no,
            "enq_id"=>$enq_id,
            "followup_date"=>date("Y-m-d",strtotime($followup_date)),
            "conversation"=>$conversation,
            "rating" => $rating
        );
        if(EnquiyFollowup::create($data)){
            $data= array('enq_status'=>'Follow Up','updated_by' => Auth::user()->id);
            Enquiry::where('cn_no', $request->input('followup_cn_no'))->update($data);

            $message = 'Record Inserted Successfully.';
        }else{
            $message = 'Record Inserted Not Successfully.';
        }
        $enqCnId = DB::table('tbl_enquiry')->select('enq_id','cn_no')->orderBy('enq_id', 'desc')->take(1)->get();
        foreach($enqCnId as $enqCnIdData){
            $enqId=$enqCnIdData->enq_id;
            $cnId=$enqCnIdData->cn_no;
        }
        $result = substr($cnId, 0, 8);
        if($result == date("Ymd")){  $cnId=$cnId+1;}else{ $cnId=date("Ymd")."1";}
        if(empty($enqId)){ $enqId=0;}
        $allEnquiryList = DB::table('tbl_enquiry')->select('*')->where("isdelete","0")->orderBy('enq_id', 'desc')->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('enquiry.addEnquiryForm',compact('enqId','cnId','allEnquiryList','goodsRS','sourceRS','statusRS','message'));
    }

    //get Follow up Id
    public function getFollowupId(){
        $cnno =$_GET['cn_no'];
        $enquiryData = DB::table('tbl_enquiry')->where('cn_no', $cnno)->get();
        foreach($enquiryData as $enquiryid){
        }
        echo json_encode($enquiryid);

    }

    //get Follow up Data
    public function getFollowupData(){
        $cnno =$_GET['cn_no'];
        $enquiryData = DB::table('tbl_enquiry_followup')->select('*')->where('cn_no', $cnno)->orderBy("followup_date","desc")->get();
        $i=0;
        foreach($enquiryData as $enquiryid){
            echo "<tr>";
            echo "<td>".date("d-m-Y",strtotime($enquiryid->followup_date))."</td>";
            echo "<td>".$enquiryid->conversation."</td>";
            echo "<td>";
            if($enquiryid->rating!=0) {
                for ($i = 1; $i <= $enquiryid->rating; $i++) {
                    echo '<span class="fa fa-star checkedStar"></span>';
                }
                for ($i = $enquiryid->rating; $i < 5; $i++) {
                    echo '<span class="fa fa-star"></span>';
                }
            }
            echo "</td>";
            echo "</tr>";
        }

    }

    //get Follow up Data
    public function getFollowup(){
        $time = time();
        $result = DB::table('tbl_enquiry')
            ->select('*')
            ->whereBetween('follow_up_date', [date("Y-m-d"), date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time) +2 ,date("Y", $time)))])
            ->where('isdelete',0)
            ->get();
        echo json_encode($result);
    }

//    testting function
    public function sendQuot(){
        $cn_no = '201905031';
        $file_name = $cn_no."_".date("hi").".pdf";
        $compRs = DB::table("tbl_company_Details")->get();
        $quotRs = DB::table("tbl_quotation")
            ->select("tbl_quotation.*",'tbl_survey.*','tbl_survey_costing.*','tbl_enquiry.*','tbl_enquiry_customer_details.*','tbl_quotation.created_at as quotCreate')
            ->join('tbl_survey','tbl_survey.cn_no','=','tbl_quotation.cn_no')
            ->join('tbl_survey_costing','tbl_survey_costing.survey_id','=','tbl_survey.survey_id')
            ->join('tbl_enquiry','tbl_enquiry.cn_no','=','tbl_quotation.cn_no')
            ->join('tbl_enquiry_customer_details','tbl_enquiry_customer_details.enq_id','=','tbl_enquiry.enq_id')
            ->where('tbl_quotation.cn_no',$cn_no)
            ->get();
        foreach ($compRs as $companyDetails){}
        foreach ($quotRs as $quotData){  }

        $articalsRs = DB::table("tbl_enquiry")
            ->select('tbl_enquiry.*','tbl_enquiry_articals_list.*','mst_tbl_home_equipment.*')
            ->join('tbl_enquiry_articals_list','tbl_enquiry_articals_list.enq_id','=','tbl_enquiry.enq_id')
            ->join('mst_tbl_home_equipment','mst_tbl_home_equipment.home_eq_id','=','tbl_enquiry_articals_list.artical_id')
            ->where('tbl_enquiry.cn_no',$cn_no)
            ->get();

        return view('sales.sendQuotationPage',compact('companyDetails','quotData','articalsRs'));
//        $pdf = PDF::loadView('sales.sendQuotationPage',compact('companyDetails','quotData','articalsRs'))->save('public/QuotationPDF/'.$file_name) ;
//        return $pdf->download();

//        $to_name = 'Harshad';
//        $to_email = 'harshad@puretechnology.in';
//        $data = array("body" => "Hello test quotation");
//        Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email,$file_name) {
//            $message->to($to_email, $to_name)
//                ->subject('test');
//            $message->from('harshad@puretechnology.in','Safemove');
//            $message->attach('public/QuotationPDF/', [
//                'as' => $file_name,
//                'mime' => 'application/pdf'
//            ]);
//        });
//        echo " ";
    }
}
?>