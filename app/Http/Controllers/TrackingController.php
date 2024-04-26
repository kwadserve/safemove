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
use App\TrackingModel;
use App\TrackingDetailsModel;
use App\FeedbackModel;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;



class TrackingController extends Controller
{
    private $activities;
    protected $foo;
    public function __construct(Foo $foo){
        $this->foo = $foo;
    }

    public function trackingPage(){
        $listData = DB::table('tbl_tracking')
            ->select("tbl_tracking.*","tbl_enquiry.*")
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_tracking.cn_no')
            ->where("tbl_tracking.isdelete","0")
            ->orderBy('tr_id', 'desc')
            ->get();
        $tr_idRs = DB::table('tbl_tracking')->select('tr_id')->orderBy('tr_id', 'desc')->take(1)->get();
        foreach($tr_idRs as $tr_idData){
            $tr_id=$tr_idData->tr_id;
        }
        if(empty($tr_id)){ $tr_id=1;}else{$tr_id++;}
        return view('tracking.trackingPageView',compact('listData','tr_id'));
    }

    public function addTrackingData(Request $request){
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'start_date.required' => 'Start date is required.',
            'end_date.required' => 'End date is required.',
        ]);

        $listData= array(
            'cn_no' => $request->input('consignment_no'),
            'invoice_no' => $request->input('invoice_no'),
            'start_date' => date("Y-m-d",strtotime($request->input('start_date'))),
            'end_date' => date("Y-m-d",strtotime($request->input('end_date'))),
            'transist_day' => $request->input('transist_day'),
            'created_by' => Auth::user()->id,
            'isdelete' => 0
        );
        $trachRs = DB::table('tbl_tracking')
            ->where("cn_no", $request->input('consignment_no'))
            ->get();
        $count = $trachRs->count();
        if($count>=1){
            $ins_flag = 0;
            $status = $request->input('status');
            $comment = $request->input('comment');
            $track_date = $request->input('track_date');
            $count = count($track_date);
            for($i=0;$i<=$count;$i++){
                if(!empty($status[$i]) && !empty($track_date[$i])){
                    $tr_details = array(
                        'tr_id' => $request->input('tracking_no'),
                        'cn_no' => $request->input('consignment_no'),
                        'tracking_status' => $status[$i],
                        'tracking_date' => date("Y-m-d",strtotime($track_date[$i])),
                        'comment' => $comment[$i]
                    );
//                    print_r($tr_details);
                    if(TrackingDetailsModel::create($tr_details)){
                        $ins_flag=1;
                    }else{
                        $ins_flag=0;
                    }
                }
            }
//            die;
            if($ins_flag==1) {
                $message = 'Record Inserted Successfully.';
            }else{
                $message = 'Record Inserted Not Successfully.';
            }
        }else {
            if(TrackingModel::create($listData)){
                $tr_id = DB::getPdo()->lastInsertId();
                $ins_flag = 0;
                $status = $request->input('status');
                $comment = $request->input('comment');
                $track_date = $request->input('track_date');
                $count = count($track_date);
                for($i=0;$i<=$count;$i++){
                    if(!empty($status[$i]) && !empty($track_date[$i])){
                        $tr_details = array(
                            'tr_id' => $tr_id,
                            'cn_no' => $request->input('consignment_no'),
                            'tracking_status' => $status[$i],
                            'tracking_date' => date("Y-m-d",strtotime($track_date[$i])),
                            'comment' => $comment[$i]
                        );
//                    print_r($tr_details);
                        if(TrackingDetailsModel::create($tr_details)){
                            $ins_flag=1;
                        }else{
                            $ins_flag=0;
                        }
                    }
                }
//            die;
                if($ins_flag==1) {
                    $message = 'Record Inserted Successfully.';
                }else{
                    $message = 'Record Inserted Not Successfully.';
                }
            }else{
                $message = 'Record Inserted Not Successfully.';
            }
        }



        $listData = DB::table('tbl_tracking')
            ->select("tbl_tracking.*","tbl_enquiry.*")
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_tracking.cn_no')
            ->where("tbl_tracking.isdelete","0")
            ->orderBy('tr_id', 'desc')
            ->get();
        $tr_idRs = DB::table('tbl_tracking')->select('tr_id')->orderBy('tr_id', 'desc')->take(1)->get();
        foreach($tr_idRs as $tr_idData){
            $tr_id=$tr_idData->tr_id;
        }
        if(empty($tr_id)){ $tr_id=1;}else{$tr_id++;}
        return view('tracking.trackingPageView',compact('listData','tr_id','message'));
    }

    //edit tracking details data
    public function editTrackDeatils($tr_id){

        $listData = DB::table('tbl_tracking')
            ->select("tbl_tracking.*","tbl_enquiry.*")
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_tracking.cn_no')
            ->where('tbl_tracking.tr_id', base64_decode($tr_id))
            ->get();

        $trackData = DB::table('tbl_tracking_details')
            ->where('tr_id', base64_decode($tr_id))
            ->get();
        return view('tracking.editTrackDetailsView',compact('listData','trackData'));
    }

    // update tracking details
    public function updateTrackingData(Request $request){
        $input = $request->all();
        $tr_id = $request->input('tr_id');
        $validator = $request->validate([
            'consignment_no' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'start_date.required' => 'Start date is required.',
            'end_date.required' => 'End date is required.',
        ]);

        $listData= array(
            'invoice_no' => $request->input('invoice_no'),
            'start_date' => date("Y-m-d",strtotime($request->input('start_date'))),
            'end_date' => date("Y-m-d",strtotime($request->input('end_date'))),
            'transist_day' => $request->input('transist_day'),
            'updated_by' => Auth::user()->id
        );

        if(TrackingModel::where('tr_id', $tr_id)->update($listData)){
            $ins_flag = 0;
            for($i=1;$i<=4;$i++){
                $trd_id = $request->input('trd_id_'.$i);
                $status = $request->input('status_'.$i);
                $comment = $request->input('comment_'.$i);
                $track_date = $request->input('track_date_'.$i);

                if(!empty($status) && !empty($comment) && !empty($track_date)){
                    $tr_details = array(
                        'tracking_status' => $status,
                        'tracking_date' => date("Y-m-d",strtotime($track_date)),
                        'comment' => $comment
                    );
                    if(TrackingDetailsModel::where('trd_id', $trd_id)->update($tr_details)){
                        $ins_flag=1;
                    }else{
                        $ins_flag=0;
                    }
                }
            }
            if($ins_flag==1) {
                $message = 'Record Updated Successfully.';
            }else{
                $message = 'Record Not Update Successfully.';
            }
        }else{
            $message = 'Update Not Successfully.';
        }

        $listData = DB::table('tbl_tracking')
            ->select("tbl_tracking.*","tbl_enquiry.*")
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_tracking.cn_no')
            ->where("tbl_tracking.isdelete","0")
            ->orderBy('tr_id', 'desc')
            ->get();
        $tr_idRs = DB::table('tbl_tracking')->select('tr_id')->orderBy('tr_id', 'desc')->take(1)->get();
        foreach($tr_idRs as $tr_idData){
            $tr_id=$tr_idData->tr_id;
        }
        if(empty($tr_id)){ $tr_id=1;}else{$tr_id++;}
        return view('tracking.trackingPageView',compact('listData','tr_id','message'));
    }

    // Delete Transport Enquiry details
    public function trackDeatilsDestroy($tr_id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(TrackingModel::where('tr_id', base64_decode($tr_id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $listData = DB::table('tbl_tracking')
            ->select("tbl_tracking.*","tbl_enquiry.*")
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_tracking.cn_no')
            ->where("tbl_tracking.isdelete","0")
            ->orderBy('tr_id', 'desc')
            ->get();
        $tr_idRs = DB::table('tbl_tracking')->select('tr_id')->orderBy('tr_id', 'desc')->take(1)->get();
        foreach($tr_idRs as $tr_idData){
            $tr_id=$tr_idData->tr_id;
        }
        if(empty($tr_id)){ $tr_id=1;}else{$tr_id++;}
        return view('tracking.trackingPageView',compact('listData','tr_id','message'));
    }

    //ajax call for get Tracking data
    public function getTrackingData(){
        $cnno =$_GET['cn_no'];
        $trachRs = DB::table('tbl_tracking')
            ->where("cn_no", $cnno)
            ->get();
        $count = $trachRs->count();
        if($count>=1){
            $trachRs = DB::table('tbl_tracking')
                ->select('tbl_tracking.*','tbl_enquiry.*', 'tbl_enquiry_customer_details.*')
                ->join('tbl_enquiry', 'tbl_tracking.cn_no', '=', 'tbl_enquiry.cn_no')
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
                ->where("tbl_tracking.cn_no", $cnno)
                ->get();
            foreach ($trachRs as $trachData) {

            }
            echo json_encode($trachData);
        }else{
            $enquiryData = DB::table('tbl_enquiry')
                ->select('tbl_enquiry.*','tbl_invoice.*', 'tbl_invoice.id as invoice_no', 'tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*','tbl_quotation.*')
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
                ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_enquiry.cn_no')
                ->join('tbl_quotation', 'tbl_quotation.cn_no', '=', 'tbl_enquiry.cn_no')
                ->where("tbl_enquiry.cn_no", $cnno)
                ->get();
            foreach ($enquiryData as $enquiryid) {

            }
            echo json_encode($enquiryid);
        }

    }

    // FeedBack Page
    public function feedbackPage(){
        $feedRs = DB::table('tbl_feedback')
            ->select("tbl_feedback.*","tbl_enquiry.*")
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_feedback.cn_no')
            ->where("tbl_feedback.isdelete","0")
            ->orderBy('id', 'desc')
            ->get();
        $FeedStatusRs = DB::table('tbl_feedback_status')->get();
        return view('tracking.feedbackPageView',compact('feedRs','FeedStatusRs'));
    }

    //ajax call for get Tracking data
    public function getFeedBackData(){
        $cnno =$_GET['cn_no'];
        $enquiryData = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*')
            ->where("tbl_enquiry.cn_no", $cnno)
            ->get();
        foreach ($enquiryData as $enquiryid) {

        }
        echo json_encode($enquiryid);
    }

    // add feedback data
    public function addFeedbackData(Request $request){
        $input = $request->all();
        $sub_rate_1=0;
        $sub_rate_2=0;
        $sub_rate_3=0;
        $sub_rate_4=0;
        $sub_rate_5=0;
        $sub_rate_6=0;
        $validator = $request->validate([
            'consignment_no' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
        ]);
        if($request->input('skill')=="Good"){
            $sub_rate_1=5;
        }elseif($request->input('skill')=="Fair"){
            $sub_rate_1=3;
        }else{
            $sub_rate_1=1;
        }

        if($request->input('breakage')=="Good"){
            $sub_rate_2=5;
        }elseif($request->input('breakage')=="Fair"){
            $sub_rate_2=3;
        }else{
            $sub_rate_2=1;
        }

        if($request->input('quality')=="Good"){
            $sub_rate_3=5;
        }elseif($request->input('quality')=="Fair"){
            $sub_rate_3=3;
        }else{
            $sub_rate_3=1;
        }

        if($request->input('attributes')=="Good"){
            $sub_rate_4=5;
        }elseif($request->input('attributes')=="Fair"){
            $sub_rate_4=3;
        }else{
            $sub_rate_4=1;
        }

        if($request->input('experience')=="Good"){
            $sub_rate_5=5;
        }elseif($request->input('experience')=="Fair"){
            $sub_rate_5=3;
        }else{
            $sub_rate_5=1;
        }

        if($request->input('time_delivery')=="Good"){
            $sub_rate_6=5;
        }elseif($request->input('time_delivery')=="Fair"){
            $sub_rate_6=3;
        }else{
            $sub_rate_6=1;
        }
        $total_rating = $sub_rate_1+$sub_rate_2+$sub_rate_3+$sub_rate_4+$sub_rate_5+$sub_rate_6;
        $avg_rating= ($total_rating/6)*2;
        $listData= array(
            'cn_no' => $request->input('consignment_no'),
            'skill' => $request->input('skill'),
            'quality' => $request->input('quality'),
            'attributes' => $request->input('attributes'),
            'experience' => $request->input('experience'),
            'time_delivery' => $request->input('time_delivery'),
            'breakage' => $request->input('breakage'),
            'work_start' => $request->input('work_start_time'),
            'labour_commit' => $request->input('labour_commit'),
            'correct_vehical' => $request->input('correct_vehical'),
            'dob' => date('Y-m-d',strtotime($request->input('dob'))),
            'working_company' => $request->input('working_company'),
            'suggestion' => $request->input('suggestion'),
            'rating' => (int)$avg_rating,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'isdelete' => 0
        );
        if(FeedbackModel::create($listData)){
            $message = 'Record Inserted Successfully.';
        }else{
            $message = 'Record Inserted Not Successfully.';
        }
        if($request->input('submit') == "save") {
            $feedRs = DB::table('tbl_feedback')
                ->select("tbl_feedback.*", "tbl_enquiry.*")
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_feedback.cn_no')
                ->where("tbl_feedback.isdelete", "0")
                ->orderBy('id', 'desc')
                ->get();
            $FeedStatusRs = DB::table('tbl_feedback_status')->get();
            return view('tracking.feedbackPageView', compact('feedRs', 'FeedStatusRs', 'message'));
        }else{
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $enquiryRs = DB::table('tbl_enquiry')
                ->select('tbl_enquiry.*','tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*' )
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
                ->where("tbl_enquiry.cn_no", $request->input('consignment_no'))
                ->get();
            foreach ($enquiryRs as $enquiryData) { }
            $feedback_data = DB::table('tbl_feedback')->where('cn_no',$request->input('consignment_no'))->first();
            return view('PrintPage.feedbackPrintView', compact('feedback_data','enquiryData','companyDetails'));
        }
    }

    // Delete FeedBack details
    public function feedBackDeatilsDestroy($id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        $feedback = FeedbackModel::find(base64_decode($id));

        if($feedback->delete()){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $feedRs = DB::table('tbl_feedback')
            ->select("tbl_feedback.*","tbl_enquiry.*")
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_feedback.cn_no')
            ->where("tbl_feedback.isdelete","0")
            ->orderBy('id', 'desc')
            ->get();
        $FeedStatusRs = DB::table('tbl_feedback_status')->get();
        return view('tracking.feedbackPageView',compact('feedRs','FeedStatusRs','message'));
    }
}
?>