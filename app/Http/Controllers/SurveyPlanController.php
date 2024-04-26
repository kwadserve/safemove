<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;
use App\Http\Requests;
use App\User;
use App\Enquiry;
use App\EnquiryArticalsList;
use App\ShiftingAddressDetails;
use App\EnqShiftingDetails;
use App\SurveyModel;
use App\SurveyPackMaterial;
use App\SurveyCosting;
use App\ConfirmJobModel;
use App\ScheduleSurveyModel;
use App\PackingMaterialModel;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;
use Mail;


class SurveyPlanController extends Controller
{
    private $activities;
    protected $foo;
    public function __construct(Foo $foo){
        $this->foo = $foo;
    }
// return enq id
    public function getEnquiryID($cn_no){
        $enqIdRs = DB::table('tbl_enquiry')->select('enq_id')->where('cn_no', $cn_no)->get();
        foreach($enqIdRs as $enqIdData){
            $eid = $enqIdData->enq_id;
        }
    return $eid;
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

    public function ownSurveyPage(){
        $surveyNextId = DB::table('tbl_survey')->select('survey_id')->orderBy('survey_id', 'desc')->take(1)->get();
        foreach($surveyNextId as $surveyNextIdData){
            $surveynxt=$surveyNextIdData->survey_id;
        }
        if(empty($surveynxt)){ $surveynxt=0;}
        $allSurveyPlan = DB::table('tbl_survey')
            ->select('tbl_survey.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
            ->where("tbl_survey.isdelete","0")
            ->orderBy('tbl_survey.survey_id', 'desc')
            ->get();
        $allEmp = DB::table('users')->select("*")->get();
        $packing_list= DB::table('tbl_packing_material')->select("*")->get();
        return view('surveyPlan.ownSurveyPageView',compact('allSurveyPlan','surveynxt','allEmp','packing_list'));
    }

    // Dispaly list of all survey schedule
    public function surveySchedule(){
        $user_id =Auth::user()->id;
        $admin = DB:: table("role_user")->select("role_id")->where("user_id",$user_id)->first();
        if($admin->role_id == 1) {
            // DB::enableQueryLog();
            $allSurveyData = DB::table('tbl_schedule_survey')
                ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
                ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
                ->where("tbl_schedule_survey.isdelete", 0)
                ->orderBy('tbl_schedule_survey.sch_id', 'desc')
                ->get();
            // dd(DB::getQueryLog());    
        } else {
             //DB::enableQueryLog();
            $allSurveyData = DB::table('tbl_schedule_survey')
                ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
                ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
                ->where("tbl_schedule_survey.isdelete", 0)
                ->Where("tbl_schedule_survey.assing_emp",$user_id )
                ->orderBy('tbl_schedule_survey.sch_id', 'desc')
                ->get();
            //dd(DB::getQueryLog());    
        }
        return view('surveyPlan.surveyScheduleView',compact('allSurveyData'));
    }

    public function importArticlesHome($cnno){
        $enquiryData = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*'/*, 'tbl_enquiry_customer_details.*'*/)
//            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->where("tbl_enquiry.cn_no",base64_decode($cnno))
            ->get();
        return view('surveyPlan.importArticlesHomeView',compact('enquiryData'));
    }
    public function confirmJobPage(){
        if(Auth::user()->role == "Admin") {
            $allConfirmJob = DB::table('tbl_confirm_job')
                ->select('tbl_confirm_job.*', 'tbl_enquiry.*')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_confirm_job.cn_no')
                ->where("tbl_confirm_job.isdelete", "0")
                ->orderBy('cj_id', 'desc')
                ->get();
        }else{
            $allConfirmJob = DB::table('tbl_confirm_job')
                ->select('tbl_confirm_job.*', 'tbl_enquiry.*')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_confirm_job.cn_no')
                ->where("tbl_confirm_job.isdelete", "0")
                ->where("tbl_confirm_job.created_by",Auth::user()->id)
                ->orderBy('cj_id', 'desc')
                ->get();
        }
        return view('surveyPlan.confirmJobPageView',compact('allConfirmJob'));
    }

    public function getConsignmentData(){
        $cnno =$_GET['cn_no'];
        $i=0;
        $enquiryData = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*'/*,'tbl_enquiry_articals_list.*'*/,'mst_tbl_vehical_details.*', 'tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*')
//            ->join('tbl_enquiry_articals_list', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_articals_list.enq_id')
            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
            ->join('mst_tbl_vehical_details', 'mst_tbl_vehical_details.vehical_id', '=', 'tbl_enquiry_shiping_details.exp_vehical')
            ->where("tbl_enquiry.cn_no", $cnno)
            ->get();
        foreach ($enquiryData as $enquiryid) {

        }
        echo json_encode($enquiryid);
    }

    public function getConsignmentResult(){
        $cnno =$_GET['cn_no'];
        $i=0;
        $enquiryData = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*'/*,'tbl_enquiry_articals_list.*'*/,'tbl_enquiry_customer_details.*')
//            ->join('tbl_enquiry_articals_list', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_articals_list.enq_id')
            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->where("tbl_enquiry.cn_no", $cnno)
            ->get();
        foreach ($enquiryData as $enquiryid) {

        }
        echo json_encode($enquiryid);
    }


    public function getCustomerData(){
        $cnno =$_GET['cn_no'];
        $i=0;
        $enquiryData = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*'/*,'tbl_enquiry_articals_list.*', 'tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*'*/)
//            ->join('tbl_enquiry_articals_list', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_articals_list.enq_id')
//            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
//            ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
            ->where("tbl_enquiry.cn_no", $cnno)
            ->get();
        foreach ($enquiryData as $enquiryid) {

        }
        echo json_encode($enquiryid);
    }

    //add Survey plan data
    public function addOwnSurvey(Request $request){
        $input = $request->all();
        // dd($input);
        $schedulePlan  = $request->input('schedulePlan');
        $without_plan  = $request->input('without_plan');
        if($without_plan =="on") {
            $validator = $request->validate([
                'consignment_no' => 'required',
                'src_address' => 'required',
                'dest_address' => 'required',
            ], [
                'consignment_no.required' => 'Consignment number is required.',
                'src_address.required' => 'Source Address is required.',
                'dest_address.required' => 'Destination Address is required.',
            ]);

            $enqID = $this->getEnquiryID($request->input('consignment_no'));

            $checkCn_noRS = DB::table("tbl_enquiry_customer_details")->where("enq_id",$enqID)->get();
            $checkCount = $checkCn_noRS->count();
            if($checkCount >= 1 && !empty($checkCn_noRS)){
                $tbl_data = array(
                    'src_add_line1'=>$request->input('src_address'),
                    'dest_add_line1'=>$request->input('dest_address')
                );
                ShiftingAddressDetails::where('enq_id', $enqID)->update($tbl_data);
            }else {
                $tbl_data = array(
                    'enq_id'=>$enqID,
                    'src_add_line1'=>$request->input('src_address'),
                    'dest_add_line1'=>$request->input('dest_address')
                );
                ShiftingAddressDetails::create($tbl_data);
            }

            $schedule_data= array(
                'cn_no'=> $request->input('consignment_no'),
                'schedule_date'=>date("Y-m-d") ,
                'schedule_time'=>date("H:i") ,
                'assing_emp'=> Auth::user()->id,
                'schedule_status' =>'Complete',
                'created_by'=> Auth::user()->id,
                'isdelete'=> 0,
            );

            ScheduleSurveyModel::create($schedule_data);

            $enquiryData = DB::table('tbl_enquiry')
                ->select('tbl_enquiry.*')
                ->where("tbl_enquiry.cn_no",$request->input('consignment_no'))
                ->get();
            return view('surveyPlan.importArticlesHomeView',compact('enquiryData'));
        }


        if($schedulePlan =="on"){
            $validator = $request->validate( [
                'consignment_no' => 'required',
                'src_address' => 'required',
                'schedule_date' => 'required',
                'schedule_time' => 'required',
                'assing_emp' => 'required',
            ],[
                'consignment_no.required' => 'Consignment number is required.',
                'src_address.required' => 'Source Address is required.',
                'schedule_date.required' => 'Schedule Date is required.',
                'schedule_time.required' => 'Schedule Time is required.',
                'assing_emp.required' => 'Assing Employee is required.',
            ]);

            $schedule_data= array(
                'cn_no'=> $request->input('consignment_no'),
                'schedule_date'=>date("Y-m-d",strtotime($request->input('schedule_date'))) ,
                'schedule_time'=>$request->input('schedule_time') ,
                'assing_emp'=> $request->input('assing_emp'),
                'schedule_status' =>'Assinged',
                'created_by'=> Auth::user()->id,
                'isdelete'=> 0,
            );
            if (ScheduleSurveyModel::create($schedule_data)) {

                $message = 'Schedule Survey Successfully.';

                $data= array('enq_status'=>'Assinged','updated_by' => Auth::user()->id);
                Enquiry::where('cn_no', $request->input('consignment_no'))->update($data);
                //check cn no existed into survey or not
                $enqID = $this->getEnquiryID($request->input('consignment_no'));

                $checkCn_noRS = DB::table("tbl_enquiry_customer_details")->where("enq_id",$enqID)->get();
                $checkCount = $checkCn_noRS->count();
                if($checkCount >= 1 && !empty($checkCn_noRS)){
                    $tbl_data = array(
                        'src_add_line1'=>$request->input('src_address'),
                        'dest_add_line1'=>$request->input('dest_address')
                    );
                    ShiftingAddressDetails::where('enq_id', $enqID)->update($tbl_data);
                }else {
                    $tbl_data = array(
                        'enq_id'=>$enqID,
                        'src_add_line1'=>$request->input('src_address'),
                        'dest_add_line1'=>$request->input('dest_address')
                    );
                    ShiftingAddressDetails::create($tbl_data);
                }


                //send sms and email to customer of schedule details
                $cn_no = $request->input('consignment_no');
                $custData = DB::table('tbl_enquiry')->where("cn_no",$cn_no)->get();
                foreach($custData as $custmoerData){
                    $to_name=$custmoerData->cust_name;
                    $to_email= $custmoerData->cust_email;
                    $cust_contact=$custmoerData->cust_contact;

                }
                $smsIntrs = DB::table('tbl_sms_integration')->get();
                foreach($smsIntrs as $smsIntData){
                    $sms_user_name=$smsIntData->user_name;
                    $sms_password= $smsIntData->password;
                    $sms_sender_id=$smsIntData->sender_id;

                }
                //send SMS to customer for schedul survey
                $smsBodyrs = DB::table('tbl_sms_template')->select("sms_body")->where("sms_for",'Survey schedule to customer')->get();
                $schedule_date = date("d-m-Y",strtotime($request->input('schedule_date')));
                $schedule_time = $request->input('schedule_time');
                foreach($smsBodyrs as $smsdate){
                    $smsbody=$smsdate->sms_body;
                    eval("\$smsbody = \"$smsbody\";");
                }
//                $smsBody = "Dear Sir/Madam, We have schedule for survey of goods on dated : ".date("d-m-Y",strtotime($request->input('schedule_date')))." at : ".$request->input('schedule_time');
                $this->sendsms($cust_contact, $sms_user_name,$sms_password,$sms_sender_id,$smsbody);

                $usersrs = DB::table('users')->where('id',$request->input('assing_emp'))->get();
                foreach($usersrs as $usersData){
                    $user_contact=$usersData->phone;
                    $user_email= $usersData->email;
                    $user_name= $usersData->first_name." ".$usersData->last_name;
                }
                // send SMS to assinged employee
                $smsBodyrs = DB::table('tbl_sms_template')->select("sms_body")->where("sms_for",'Survey schedule to employee')->get();
                $schedule_date = date("d-m-Y",strtotime($request->input('schedule_date')));
                $schedule_time = $request->input('schedule_time');
                $cnno = $request->input('consignment_no');
                foreach($smsBodyrs as $smsdate){
                    $smsbody2=$smsdate->sms_body;
                    eval("\$smsbody2 = \"$smsbody2\";");
                }
//                $smsBody2 = "Dear Employee, We have assigned survey schedule for CN NO- ".$request->input('consignment_no')." on dated : ".date("d-m-Y",strtotime($request->input('schedule_date')))." at : ".$request->input('schedule_time');
                $this->sendsms($user_contact, $sms_user_name,$sms_password,$sms_sender_id,$smsbody2);

                // send Email to customer
                $emailBodyrs = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'schedule survey')->get();
                $surveyDate = $request->input('schedule_date');
                $surveyTime = $request->input('schedule_time');
                foreach($emailBodyrs as $emaildate){
                    $emailbody=$emaildate->email_body;
                    eval("\$emailbody = \"$emailbody\";");
                }
                $data = array("body" => $emailbody);

                Mail::send(['html'=>'mail'], $data, function($message) use ($user_name, $to_email) {
                    $message->to($to_email, $user_name)
                        ->subject('Assinged Survey Schedule');
                    $message->from('contact@safemove.in','Safemove');
                });

                // Send email to assinged employee
                $emailBodyrs1 = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'assinged survey')->get();
                $cn_no = $request->input('consignment_no');
                $surveyDate = $request->input('schedule_date');
                $surveyTime = $request->input('schedule_time');
                foreach($emailBodyrs1 as $emaildate1){
                    $emailbody1=$emaildate1->email_body;
                    eval("\$emailbody1 = \"$emailbody1\";");
                }
                $data = array("body" => $emailbody1);

                Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $user_email) {
                    $message->to($user_email, $to_name)
                        ->subject('Schedule Survey');
                    $message->from('contact@safemove.in','Safemove');
                });

            } else {
                $message = 'Schedule Survey Not Successfully.';
            }

            $surveyNextId = DB::table('tbl_survey')->select('survey_id')->orderBy('survey_id', 'desc')->take(1)->get();
            foreach($surveyNextId as $surveyNextIdData){
                $surveynxt=$surveyNextIdData->survey_id;
            }
            if(empty($surveynxt)){ $surveynxt=0;}
            $allSurveyPlan = DB::table('tbl_survey')
                ->select('tbl_survey.*','tbl_enquiry.cust_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
                ->where("tbl_survey.isdelete","0")
                ->orderBy('tbl_survey.survey_id', 'desc')
                ->get();
            $allEmp = DB::table('users')->select("*")->get();
            $packing_list= DB::table('tbl_packing_material')->select("*")->get();
            return view('surveyPlan.ownSurveyPageView',compact('allSurveyPlan','surveynxt','allEmp','packing_list','message'));


        } else {
            
            $validator = $request->validate([
                'consignment_no' => 'required',
                'total_quat_amt' => 'required',
                'src_address' => 'required',
                'dest_address' => 'required',
                'good_value' => 'required',
            ], [
                'consignment_no.required' => 'Consignment number is required.',
                'total_quat_amt.required' => 'Total quotation amount is required.',
                'src_address.required' => 'Source Address is required.',
                'dest_address.required' => 'Destination Address is required.',
                'good_value.required' => 'Goods Value is required.',
            ]);
            $checkSurveyID = $this->checkSurvey($request->input('consignment_no'));
            if (!empty($checkSurveyID)) {
                //insert tbl_survey data
                $data = array(
                    'cn_no' => $request->input('consignment_no'),
                    'laboure_req' => $request->input('laboure_req'),
                    'total_costing_amt' => $request->input('total_costing_charges'),
                    'total_pack_mat_amt' => $request->input('total_pack_mate_amt'),
                    'goods_value' => $request->input('good_value'),
                    'survey_status' => "Complete",
                    'survey_remark' =>$request->input('remark'),
                    'margin' => $request->input('margin_per'),
                    'total_quot_amt' => $request->input('total_quat_amt'),
                    'updated_by' => Auth::user()->id
                );
                SurveyModel::where('survey_id', $checkSurveyID)->update($data);

                $cost_data = array(
                    'loading_chrg' => $request->input('loading_charges'),
                    'local_transp' => $request->input('local_transportation'),
                    'transportation_chrg' => $request->input('transportation_charges'),
                    'unloading_chrg' => $request->input('unloading_charges'),
                    'delivery_chrg' => $request->input('delivery_charges'),
                    'car_transp_chrg' => $request->input('car_trans_charges'),
                    'other_chrg' => $request->input('other_charges'),
                    'total_costing' => $request->input('total_costing_charges')
                );

                SurveyCosting::where('survey_id', $checkSurveyID)->update($cost_data);

                $packData = array(
                    'roll_qty' => $request->input('roll_qty'),
                    'roll_price' => $request->input('roll_price'),
                    'roll_total_amt' => $request->input('roll_total_amt'),
                    'boxes_qty' => $request->input('boxes_qty'),
                    'boxes_price' => $request->input('boxes_price'),
                    'boxes_total_amt' => $request->input('boxes_total_amt'),
                    'tap_qty' => $request->input('tap_qty'),
                    'tap_price' => $request->input('tap_price'),
                    'tap_total_amt' => $request->input('tap_total_amt'),
                    'airbubble_qty' => $request->input('air_bubble_qty'),
                    'airbubble_price' => $request->input('air_bubble_price'),
                    'airbubble_total_amt' => $request->input('air_bubble_total_amt'),
                    'thermacol_qty' => $request->input('thermacol_qty'),
                    'thermacol_price' => $request->input('thermacol_price'),
                    'thermacol_total_amt' => $request->input('thermacol_total_amt'),
                    'newspaper_qty' => $request->input('news_paper_qty'),
                    'newpaper_price' => $request->input('news_paper_price'),
                    'newspaper_total_amt' => $request->input('news_paper_total_amt'),
                    'strfilm_qty' => $request->input('stretch_film_qty'),
                    'strfilm_price' => $request->input('stretch_film_price'),
                    'strfilm_total_amt' => $request->input('stretch_film_total_amt'),
                    'foamsheet_qty' => $request->input('foam_sheet_qty'),
                    'foamsheet_price' => $request->input('foam_sheet_price'),
                    'foamsheet_total_amt' => $request->input('foam_sheet_total_amt'),
                    'other_qty' => $request->input('other_qty'),
                    'other_price' => $request->input('other_price'),
                    'other_total_amt' => $request->input('other_total_amt')
                );
                if (SurveyPackMaterial::where('survey_id', $checkSurveyID)->update($packData)) {
                    $message = 'Record Updated Successfully.';

                    //update Quotation Amount in quotation table
                    $quot_data = SurveyModel::checkQuoationIs($request->input('consignment_no'));
                    if(count($quot_data)>=1){
                        $temp_net_amt = ($request->input('total_quat_amt') + $quot_data->other)- $quot_data->discount;
                        if($quot_data->cost_type != "cost_exclude2"){
                            $new_net_amt = $temp_net_amt;
                            $new_service_tax = "0.00";
                        }else{
                            $new_service_tax = $temp_net_amt * ($quot_data->cost_ex_service_tax/100);
                            $new_net_amt = $temp_net_amt+$new_service_tax;
                        }
                        DB::table('tbl_quotation')->where('quot_id',$quot_data->quot_id)->update(
                            array(
                                'amount'=>$request->input('total_quat_amt'),
                                'net_amount'=>$new_net_amt,
                                'after_service_tax'=>$new_service_tax
                            )
                        );
                    }

                } else {
                    $message = 'Record Not Updated Successfully.';
                }

                $surveyNextId = DB::table('tbl_survey')->select('survey_id')->orderBy('survey_id', 'desc')->take(1)->get();
                foreach ($surveyNextId as $surveyNextIdData) {
                    $surveynxt = $surveyNextIdData->survey_id;
                }
                if (empty($surveynxt)) {
                    $surveynxt = 0;
                }
                $allSurveyPlan = DB::table('tbl_survey')
                    ->select('tbl_survey.*', 'tbl_enquiry.cust_name')
                    ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
                    ->where("tbl_survey.isdelete", "0")
                    ->orderBy('tbl_survey.survey_id', 'desc')
                    ->get();
                $allEmp = DB::table('users')->select("*")->get();
                $packing_list = DB::table('tbl_packing_material')->select("*")->get();
                return view('surveyPlan.ownSurveyPageView', compact('allSurveyPlan', 'surveynxt', 'allEmp', 'packing_list', 'message'));

            } else {
                //insert tbl_survey data
                $data = array(
                    'cn_no' => $request->input('consignment_no'),
                    'survey_date' => date("Y-m-d", strtotime($request->input('survey_date'))),
                    'laboure_req' => $request->input('laboure_req'),
                    'total_costing_amt' => $request->input('total_costing_charges'),
                    'total_pack_mat_amt' => $request->input('total_pack_mate_amt'),
                    'goods_value' => $request->input('good_value'),
                    'survey_status' => "Complete",
                    'survey_remark' =>$request->input('remark'),
                    'margin' => $request->input('margin_per'),
                    'total_quot_amt' => $request->input('total_quat_amt'),
                    'created_by' => Auth::user()->id
                );

                SurveyModel::create($data);
                $survey_id = DB::getPdo()->lastInsertId();

                //insert tbl_survey_costing data
                $cost_data = array(
                    'survey_id' => $survey_id,
                    'loading_chrg' => $request->input('loading_charges'),
                    'local_transp' => $request->input('local_transportation'),
                    'transportation_chrg' => $request->input('transportation_charges'),
                    'unloading_chrg' => $request->input('unloading_charges'),
                    'delivery_chrg' => $request->input('delivery_charges'),
                    'car_transp_chrg' => $request->input('car_trans_charges'),
                    'other_chrg' => $request->input('other_charges'),
                    'total_costing' => $request->input('total_costing_charges'),
                    'created_by' => Auth::user()->id,
                    'isdelete' => 0
                );

                SurveyCosting::create($cost_data);

                // insert tbl_survey_packing_mate data
                $packData = array(
                    'survey_id' => $survey_id,
                    'roll_qty' => $request->input('roll_qty'),
                    'roll_price' => $request->input('roll_price'),
                    'roll_total_amt' => $request->input('roll_total_amt'),
                    'boxes_qty' => $request->input('boxes_qty'),
                    'boxes_price' => $request->input('boxes_price'),
                    'boxes_total_amt' => $request->input('boxes_total_amt'),
                    'tap_qty' => $request->input('tap_qty'),
                    'tap_price' => $request->input('tap_price'),
                    'tap_total_amt' => $request->input('tap_total_amt'),
                    'airbubble_qty' => $request->input('air_bubble_qty'),
                    'airbubble_price' => $request->input('air_bubble_price'),
                    'airbubble_total_amt' => $request->input('air_bubble_total_amt'),
                    'thermacol_qty' => $request->input('thermacol_qty'),
                    'thermacol_price' => $request->input('thermacol_price'),
                    'thermacol_total_amt' => $request->input('thermacol_total_amt'),
                    'newspaper_qty' => $request->input('news_paper_qty'),
                    'newpaper_price' => $request->input('news_paper_price'),
                    'newspaper_total_amt' => $request->input('news_paper_total_amt'),
                    'strfilm_qty' => $request->input('stretch_film_qty'),
                    'strfilm_price' => $request->input('stretch_film_price'),
                    'strfilm_total_amt' => $request->input('stretch_film_total_amt'),
                    'foamsheet_qty' => $request->input('foam_sheet_qty'),
                    'foamsheet_price' => $request->input('foam_sheet_price'),
                    'foamsheet_total_amt' => $request->input('foam_sheet_total_amt'),
                    'other_qty' => $request->input('other_qty'),
                    'other_price' => $request->input('other_price'),
                    'other_total_amt' => $request->input('other_total_amt')
                );
                if (SurveyPackMaterial::create($packData)) {

                    $message = 'Record Inserted Successfully.';
                } else {
                    $message = 'Record Inserted Not Successfully.';
                }

                $surveyNextId = DB::table('tbl_survey')->select('survey_id')->orderBy('survey_id', 'desc')->take(1)->get();
                foreach ($surveyNextId as $surveyNextIdData) {
                    $surveynxt = $surveyNextIdData->survey_id;
                }
                if (empty($surveynxt)) {
                    $surveynxt = 0;
                }
                $allSurveyPlan = DB::table('tbl_survey')
                    ->select('tbl_survey.*', 'tbl_enquiry.cust_name')
                    ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
                    ->where("tbl_survey.isdelete", "0")
                    ->orderBy('tbl_survey.survey_id', 'desc')
                    ->get();
                $allEmp = DB::table('users')->select("*")->get();
                $packing_list = DB::table('tbl_packing_material')->select("*")->get();
                return view('surveyPlan.ownSurveyPageView', compact('allSurveyPlan', 'surveynxt', 'allEmp', 'packing_list', 'message'));
            }
        }
    }

    public function checkSurvey($cn_no){
        $checkData = DB::table('tbl_survey')
            ->select('survey_id')
            ->where("cn_no",$cn_no)
            ->get();
        $wordCount = $checkData->count();
        if($wordCount >= 1){
            foreach ($checkData as $survey){
                return $survey->survey_id;
            }
        }else{
            $temp = "";
            return $temp;
        }
    }

// Display survey details
    public function surveyDetails($id){
        $surveyrs = DB::table('tbl_survey')
            ->select('tbl_survey.*','tbl_survey_costing.*','tbl_survey_packing_mate.*','tbl_survey.created_at as scat','tbl_survey.updated_at as supat','users1.first_name as u1fst','users1.last_name as u1lst','users2.first_name as u2fst','users1.last_name as u2lst')
            ->join('tbl_survey_costing', 'tbl_survey_costing.survey_id', '=', 'tbl_survey.survey_id')
            ->join('tbl_survey_packing_mate', 'tbl_survey_packing_mate.survey_id', '=', 'tbl_survey.survey_id')
            ->join('users as users1', 'tbl_survey.created_by', '=', 'users1.id')
            ->join('users as users2', 'tbl_survey.updated_by', '=', 'users2.id')
            ->where('tbl_survey.survey_id', base64_decode($id))
            ->get();
        foreach ($surveyrs as $surveyData){}
        return view('surveyPlan.surveyDetailsView',compact('surveyData'));
    }

// Display Confirm Job details
    public function confirmJobDetails($id){
        $cjrs = DB::table('tbl_confirm_job')
            ->select('tbl_confirm_job.*','tbl_confirm_job.created_at as cjcat','tbl_confirm_job.updated_at as cjupat','users1.first_name as u1fst','users1.last_name as u1lst','users2.first_name as u2fst','users2.last_name as u2lst')
            ->join('users as users1', 'tbl_confirm_job.created_by', '=', 'users1.id')
            ->join('users as users2', 'tbl_confirm_job.updated_by', '=', 'users2.id')
            ->where('tbl_confirm_job.cj_id', base64_decode($id))
            ->get();
        foreach ($cjrs as $cjData){}
        return view('surveyPlan.confirmJobDetailsView',compact('cjData'));
    }

    public function getConfirmJobData(){
        $cnno =$_GET['cn_no'];
//        $enquiryData = DB::table('tbl_survey')
//            ->select('tbl_survey.*','tbl_enquiry.*','tbl_quotation.*','tbl_enquiry_customer_details.*')
//            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
//            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
//            ->join('tbl_quotation', 'tbl_quotation.cn_no', '=', 'tbl_survey.cn_no')
//            ->where("tbl_survey.cn_no",$cnno)
//            ->get();
        $con_job= DB::table('tbl_confirm_job')
            ->select('tbl_enquiry.*', 'tbl_quotation.*', 'tbl_enquiry_customer_details.*','tbl_confirm_job.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_confirm_job.cn_no')
            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->join('tbl_quotation', 'tbl_quotation.cn_no', '=', 'tbl_confirm_job.cn_no')
            ->where("tbl_confirm_job.cn_no",$cnno)
            ->get();
        $count=$con_job->count();
        if($count >=1){
            foreach ($con_job as $con_jobData) {
            }
            echo json_encode($con_jobData);
        }else {
            $enquiryData = DB::table('tbl_quotation')
                ->select('tbl_enquiry.*', 'tbl_quotation.*', 'tbl_enquiry_customer_details.*')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->where("tbl_quotation.cn_no", $cnno)
                ->get();
            foreach ($enquiryData as $enquiryid) {

            }
            echo json_encode($enquiryid);
        }
    }

    //add Confirm Job data
    public function addConfirmJob(Request $request){
        $addFlag =0;
        $input = $request->all();
        $validator = $request->validate([
            'cn_no' => 'required',
            'moving_date' => 'required',
            'moving_time' => 'required',
        ], [
            'cn_no.required' => 'Consignment number is required.',
            'moving_date.required' => 'Moving date is required.',
            'moving_time.required' => 'Moving time is required.',
        ]);

        //insert tbl_confirm_job data

        $jobs= DB::table('tbl_confirm_job')
            ->where("cn_no",$request->input('cn_no'))
            ->get();
        $count=$jobs->count();
        if($count>=1){
            $cost_data = array(
                'survey_id' => $request->input('survey_id'),
                'cn_no' => $request->input('cn_no'),
                'moving_date' => date("Y-m-d",strtotime($request->input('moving_date'))),
                'moving_time' => $request->input('moving_time'),
                'updated_by' => Auth::user()->id
            );
            if(ConfirmJobModel::where('cn_no', $request->input('cn_no'))->update($cost_data)){
                $addFlag=1;
            }else{
                $addFlag=0;
            }

        }else{
            $cost_data = array(
                'survey_id' => $request->input('survey_id'),
                'cn_no' => $request->input('cn_no'),
                'moving_date' => date("Y-m-d",strtotime($request->input('moving_date'))),
                'moving_time' => $request->input('moving_time'),
                'status' => "Confirm",
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'isdelete' => 0
            );
            if(ConfirmJobModel::create($cost_data)){
                $addFlag=1;
            }else{
                $addFlag=0;
            }
        }

        if($addFlag==1){
            $message = 'Record Inserted Successfully.';
        }else{
            $message = 'Record Inserted Not Successfully.';
        }

        $allConfirmJob = DB::table('tbl_confirm_job')
            ->select('tbl_confirm_job.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_confirm_job.cn_no')
            ->where("tbl_confirm_job.isdelete","0")
            ->orderBy('cj_id', 'desc')
            ->get();
        return view('surveyPlan.confirmJobPageView',compact('allConfirmJob','message'));
    }

    //edit Packing list data
    public function editConfirmJob($cj_id){
        $listData = DB::table('tbl_confirm_job')
            ->select('tbl_confirm_job.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_confirm_job.cn_no')
            ->where('cj_id', base64_decode($cj_id))
            ->get();
        return view('surveyPlan.editconfirmJob',compact('listData'));
    }

    //update Confirm Job data
    public function updateConfirmJob(Request $request){
        $input = $request->all();
        $cj_id = $request->input('cj_id');
        $validator = $request->validate([
            'cn_no' => 'required',
            'moving_date' => 'required',
            'moving_time' => 'required',
        ], [
            'cn_no.required' => 'Consignment number is required.',
            'moving_date.required' => 'Moving date is required.',
            'moving_time.required' => 'Moving time is required.',
        ]);

        //update tbl_confirm_job data
        $cost_data = array(
            'moving_date' => date("Y-m-d",strtotime($request->input('moving_date'))),
            'moving_time' => $request->input('moving_time'),
            'updated_by' => Auth::user()->id
        );

        if(ConfirmJobModel::where('cj_id', $cj_id)->update($cost_data)){
            $message = 'Record Update Successfully.';
        }else{
            $message = 'Record Update Not Successfully.';
        }

        $allConfirmJob = DB::table('tbl_confirm_job')
            ->select('tbl_confirm_job.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_confirm_job.cn_no')
            ->where("tbl_confirm_job.isdelete","0")
            ->orderBy('cj_id', 'desc')
            ->get();
        return view('surveyPlan.confirmJobPageView',compact('allConfirmJob','message'));
    }
    // Delete survey details
    public function surveyDestroy($s_id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(SurveyModel::where('survey_id', base64_decode($s_id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $surveyNextId = DB::table('tbl_survey')->select('survey_id')->orderBy('survey_id', 'desc')->take(1)->get();
        foreach($surveyNextId as $surveyNextIdData){
            $surveynxt=$surveyNextIdData->survey_id;
        }
        if(empty($surveynxt)){ $surveynxt=0;}
        $allSurveyPlan = DB::table('tbl_survey')
            ->select('tbl_survey.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
            ->where("tbl_survey.isdelete","0")
            ->orderBy('tbl_survey.survey_id', 'desc')
            ->get();
        $allEmp = DB::table('users')->select("*")->get();
        $packing_list= DB::table('tbl_packing_material')->select("*")->get();
        return view('surveyPlan.ownSurveyPageView',compact('allSurveyPlan','surveynxt','allEmp','packing_list','message'));
    }
    // Delete confirm Job details
    public function confirmJobDestroy($cj_id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(ConfirmJobModel::where('cj_id', base64_decode($cj_id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $allConfirmJob = DB::table('tbl_confirm_job')
            ->select('tbl_confirm_job.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_confirm_job.cn_no')
            ->where("tbl_confirm_job.isdelete","0")
            ->orderBy('cj_id', 'desc')
            ->get();
        return view('surveyPlan.confirmJobPageView',compact('allConfirmJob','message'));
    }

    //check survey visit complete or not
    public function checkSurveyComplete($cn_no){
        $cn_no = $_GET['cn_no'];
        $checkData = DB::table('tbl_schedule_survey')
            ->select('*')
            ->where("cn_no",$cn_no)
//            ->orWhere("schedule_status","Complete")
            ->get();
        $wordCount = $checkData->count();
        if($wordCount >= 1){
            $checkData = DB::table('tbl_schedule_survey')
                ->select('*')
                ->where("cn_no",$cn_no)
                ->where("schedule_status","Complete")
                ->get();
            $wordCount = $checkData->count();
            if($wordCount >= 1){
                echo "1";
            }else{
                echo "11";
            }
        }else {
            $checkData = DB::table('tbl_enquiry')
                ->select('tbl_enquiry.*','tbl_enquiry_shiping_details.*')
                ->join('tbl_enquiry_shiping_details','tbl_enquiry_shiping_details.last_eq_id','=','tbl_enquiry.enq_id')
                ->where("tbl_enquiry.cn_no",$cn_no)
                ->get();
            $wordCount = $checkData->count();
            if($wordCount >= 1){
                echo "22";
            }else{
                echo "0";
            }
        }

    }

    //check survey for edit or not
    public function checkSurveyForEdit($cn_no){
        $cn_no = $_GET['cn_no'];
        $checkData = DB::table('tbl_survey')
            ->select('*')
            ->where("cn_no",$cn_no)
            ->get();
        $wordCount = $checkData->count();
        if($wordCount >= 1){
            echo "1";
        }else {
            echo "0";
        }
    }

    //get survey Data for edit
    public function getSurveyEditData($cn_no){
        $cn_no = $_GET['cn_no'];
        $surveyData = DB::table('tbl_survey')
            ->select('tbl_survey.*','tbl_enquiry.*','tbl_enquiry_shiping_details.*','mst_tbl_vehical_details.*','tbl_enquiry_customer_details.*','tbl_survey_costing.*','tbl_survey_packing_mate.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
            ->join('mst_tbl_vehical_details', 'mst_tbl_vehical_details.vehical_id', '=', 'tbl_enquiry_shiping_details.exp_vehical')
            ->join('tbl_survey_costing', 'tbl_survey_costing.survey_id', '=', 'tbl_survey.survey_id')
            ->join('tbl_survey_packing_mate', 'tbl_survey_packing_mate.survey_id', '=', 'tbl_survey.survey_id')
            ->where("tbl_survey.cn_no",$cn_no)
            ->get();
        foreach ($surveyData as $survey) {

        }
        echo json_encode($survey);
    }


    //edit survey schedule details
    public function editSchedule($sch_id){
        $listData = DB::table('tbl_schedule_survey')
            ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
            ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
            ->where('sch_id', base64_decode($sch_id))
            ->get();
        $allEmp = DB::table('users')->select("*")->get();
        return view('surveyPlan.editSchedulePageView',compact('listData','allEmp'));
    }

    //update survey schedule details
    public function updateSchedule(Request $request){
        $input = $request->all();
        $sch_id = $request->input('sch_id');
        $validator = $request->validate([
            'schedule_date' => 'required',
            'schedule_time' => 'required',
            'assing_emp' => 'required',
        ], [
            'schedule_date.required' => 'Schedule Date is required.',
            'schedule_time.required' => 'Schedule Time is required.',
            'assing_emp.required' => 'Assign Employee is required.',
        ]);

        //update tbl_confirm_job data
        $schedule_data = array(
            'schedule_date' => date("Y-m-d",strtotime($request->input('schedule_date'))),
            'schedule_time' => $request->input('schedule_time'),
            'assing_emp'=> $request->input('assing_emp'),
            'updated_by' => Auth::user()->id
        );

        if(ScheduleSurveyModel::where('sch_id', $sch_id)->update($schedule_data)){
            $message = 'Record Update Successfully.';
        }else{
            $message = 'Record Update Not Successfully.';
        }

        $user_id =Auth::user()->id;
        $admin = DB:: table("role_user")->select("user_id")->where("role_id",1)->first();
       
        if($user_id == $admin->user_id) {
            $allSurveyData = DB::table('tbl_schedule_survey')
                ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
                ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
                ->where("tbl_schedule_survey.isdelete", "0")
                ->orderBy('tbl_schedule_survey.sch_id', 'desc')
                ->get();
        } else {
            $allSurveyData = DB::table('tbl_schedule_survey')
                ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
                ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
                ->where("tbl_schedule_survey.isdelete", "0")
                ->orWhere("tbl_schedule_survey.assing_emp",$user_id )
                ->orderBy('tbl_schedule_survey.sch_id', 'desc')
                ->get();
        }
        return view('surveyPlan.surveyScheduleView',compact('allSurveyData','message'));
    }
    // Delete survey schedule details
    public function scheduleDestroy($sch_id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(ScheduleSurveyModel::where('sch_id', base64_decode($sch_id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        return redirect('/surveySchedule');
        // $user_id =Auth::user()->id;
        // $admin = DB:: table("role_user")->select("user_id")->where("role_id",1)->get();
        // foreach ($admin as $adminData){
        //     $admin_id=$adminData->user_id;
        // }
        // if($user_id == $admin_id) {
        //     $allSurveyData = DB::table('tbl_schedule_survey')
        //         ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
        //         ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
        //         ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
        //         ->where("tbl_schedule_survey.isdelete", "0")
        //         ->orderBy('tbl_schedule_survey.sch_id', 'desc')
        //         ->get();
        // } else {
        //     $allSurveyData = DB::table('tbl_schedule_survey')
        //         ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
        //         ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
        //         ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
        //         ->where("tbl_schedule_survey.isdelete", "0")
        //         ->orWhere("tbl_schedule_survey.assing_emp",$user_id )
        //         ->orderBy('tbl_schedule_survey.sch_id', 'desc')
        //         ->get();
        // }
        // return view('surveyPlan.surveyScheduleView',compact('allSurveyData','message'));
    }

    //edit artical list schedule details
    public function editArticlesHome($cn_no){
        
        $listData = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*', 'tbl_enquiry_articals_list.*', 'mst_tbl_home_equipment.home_eq_id', 'mst_tbl_home_equipment.eq_name')
            ->join('tbl_enquiry_articals_list', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_articals_list.enq_id')
            ->join('mst_tbl_home_equipment', 'mst_tbl_home_equipment.home_eq_id', '=', 'tbl_enquiry_articals_list.artical_id')
            ->where('tbl_enquiry.cn_no', base64_decode($cn_no))
            ->get();

        $enq_data = DB::table('tbl_enquiry')
            ->select('tbl_enquiry_shiping_details.*','tbl_enquiry.*')
            ->join('tbl_enquiry_shiping_details','tbl_enquiry_shiping_details.last_eq_id','=','tbl_enquiry.enq_id')
            ->where('tbl_enquiry.cn_no', base64_decode($cn_no))
            ->get();
            //dd($enq_data);
         foreach ($enq_data as $enq_data){}
        
        $allArtcal = DB::table('mst_tbl_home_equipment')->get();
        return view('surveyPlan.editArticalListPageView',compact('listData','allArtcal','enq_data'));
    }

    public function updateArticalListData(Request $request){
//        print_r($request->all());die;
        $enq_id =$request->input('enq_id');
        $artical_id =$request->input('artical_id');
        $artical_count =$request->input('artical_count');

        EnquiryArticalsList::where('enq_id',$enq_id)->delete();

        $total_cft=0;
        $exp_vehical=0;
        $kilometer=$request->input('kilometer');
        $kilometer_id=0;
        $labour_charges= 0;
        $transport_charges= 0;
        $packing_charges= 0;
        $total_amt= 0;
        $articalesCount=count($request->input('artical_id'));

        for($i=0;$i<$articalesCount;$i++){
            $data=array(
                "artical_id"=>$artical_id[$i],
                "artical_count"=>$artical_count[$i],
                "enq_id"=>$enq_id
            );
            EnquiryArticalsList::create($data);
            $rs_cft_amt= DB::table('mst_tbl_additional_cft')->select('*')->get(); // get all data ctf range and amount form mst_tbl_cft_base_amount

            $rs_cft = DB::table('mst_tbl_home_equipment')->select('eq_cft')->where("home_eq_id",$artical_id[$i])->get();
            foreach($rs_cft as $data_cft){
                $eq_cft= $data_cft->eq_cft;
            }
            $total_eq_cft= $eq_cft*$artical_count[$i]; // calculate cft depend upon the no of articals
            $total_cft= $total_cft+$total_eq_cft;// calculate total cft
        }

        foreach($rs_cft_amt as $data_cft_amt){
            if($total_cft>=$data_cft_amt->cft_start_range && $total_cft<=$data_cft_amt->cft_end_range){
                $total_cft= $total_cft+$data_cft_amt->additional_cft;
            }
        }

        $rs_vehical_id=  DB::table('mst_tbl_vehical_details')->select('*')->get();
        foreach($rs_vehical_id as $data_vehical_id){
            if($total_cft>=$data_vehical_id->cft_start_range && $total_cft<=$data_vehical_id->cft_end_range){
                $exp_vehical= $data_vehical_id->vehical_id; // get expected vehical id
                $exp_no_of_lab_req = $data_vehical_id->labour_required; // get expected laboure required id
            }

        }

        $rs_km_id=  DB::table('mst_tbl_kilometer')
            ->select('*')
            ->get();
        foreach($rs_km_id as $data_km_id){
            if($kilometer>=$data_km_id->km_start_range && $kilometer<=$data_km_id->km_end_range){
                $kilometer_id= $data_km_id->km_id; // get kilometer id
                break;
            }
        }
        $rs_km_amount=  DB::table('mst_tbl_km_wise_amt')
            ->select('*')
            ->where("km_id",$kilometer_id)
            ->where("vehical_id",$exp_vehical)
            ->get();
        foreach($rs_km_amount as $data_km_amount){
            $labour_charges = $data_km_amount->labour_charges; // get kilometer wise labour_charges amount
            $transport_charges = $data_km_amount->transport_charges; // get kilometer wise transport_charges amount
            $packing_charges = $data_km_amount->packing_charges; // get kilometer wise packing_charges amount
            $total_amt = $data_km_amount->total_amt; // get kilometer wise total amount
        }

        $shiping_data= array(
            "total_cft"=>$total_cft,
            "last_eq_id"=>$enq_id,
            "kilometer"=>$kilometer,
            "exp_vehical"=>$exp_vehical,
            "exp_no_of_lab_req"=>$exp_no_of_lab_req,
            "labour_charges"=>$labour_charges,
            "transport_charges"=>$transport_charges,
            "packing_charges"=>$packing_charges,
            "total_amt"=>$total_amt
        );
//        print_r($shiping_data); die;

        EnqShiftingDetails::where("last_eq_id",$enq_id)->update($shiping_data);

//        $this->surveySchedule()
            return redirect()->action('SurveyPlanController@surveySchedule');
    }

    // Dispaly list of all survey Articals list
    public function surveyArticals(){
        $user_id =Auth::user()->id;
        $admin = DB:: table("role_user")->select("user_id")->where("role_id",1)->get();
        foreach ($admin as $adminData){
            $admin_id=$adminData->user_id;
        }

        $allSurveyData = DB::table('tbl_schedule_survey')
            ->select('tbl_schedule_survey.*', 'tbl_enquiry.cust_name', 'users.first_name', 'users.last_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
            ->join('users', 'users.id', '=', 'tbl_schedule_survey.assing_emp')
            ->where("tbl_schedule_survey.isdelete", "0")
            ->orderBy('tbl_schedule_survey.sch_id', 'desc')
            ->get();

        return view('surveyPlan.surveyScheduleView',compact('allSurveyData'));
    }
}
?>