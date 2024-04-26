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
use App\InvoiceModel;
use App\QuotationModel;
use App\SurveyModel;
use App\Enquiry;
use App\ScheduleSurveyModel;
use App\PaymentModel;
use App\TransPaymentModel;
use App\SrcDestExpenssModel;
use App\SourceExpenssModel;
use App\DestinationExpenssModel;
use App\OfficeExpensesModel;
use DB;
use PDF;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;
use Mail;



class ReportController extends Controller
{
    private $activities;
    protected $foo;

    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    // Display Report Page
    public function allReportPage(){
        return view('reports.allReportPageView');
    }

    //dispaly enquiry report view
    public function enquiryReportPage(Request $request){
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        $enqReportData = "";
        if($request->input('submit')=="enquiryReport"){
            $goodtype = $request->input('good_types');
            $refrs = $request->input('reference');
            $from_date = date('Y-m-d',strtotime($request->input('from_date')));
            $to_date = date('Y-m-d',strtotime($request->input('to_date')));

            if($goodtype=="All" && $refrs!="All"){
                $enqReportData = DB::table('tbl_enquiry')
                    ->select('cn_no','cust_name','cust_contact','cust_email','enq_status','created_at')
                    ->where("isdelete","0")
                    ->where("reference",$refrs)
                    ->whereBetween('created_at', array($from_date, $to_date))
                    ->get();

            }else if($goodtype!="All" && $refrs=="All"){
                $enqReportData = DB::table('tbl_enquiry')
                    ->select('cn_no','cust_name','cust_contact','cust_email','enq_status','created_at')
                    ->where("isdelete","0")
                    ->where("enquiry_type",$goodtype)
                    ->whereBetween('created_at', array($from_date, $to_date))
                    ->get();
            }else if($goodtype!="All" && $refrs!="All"){
                $enqReportData = DB::table('tbl_enquiry')
                    ->select('cn_no','cust_name','cust_contact','cust_email','enq_status','created_at')
                    ->where("isdelete","0")
                    ->where("enquiry_type",$goodtype)
                    ->where("reference",$refrs)
                    ->whereBetween('created_at', array($from_date, $to_date))
                    ->get();

            }else{
                $enqReportData = DB::table('tbl_enquiry')
                    ->select('cn_no','cust_name','cust_contact','cust_email','enq_status','created_at')
                    ->where("isdelete","0")
                    ->whereBetween('created_at', array($from_date, $to_date))
                    ->get();
            }
        }
        return view('reports.enquiryReportView',compact('goodsRS','sourceRS','enqReportData'));
    }

    //Ajax Call for enquiry reoprt
    public function getEnquiryReportData(){
        $goodtype = $_GET['goodtype'];
        $refrs = $_GET['refrs'];

        if($goodtype=="All" && $refrs!="All"){
            $allEnquiryList = DB::table('tbl_enquiry')
                ->select('cn_no','cust_name','cust_contact','cust_email','enq_status','created_at')
                ->where("isdelete","0")
                ->where("reference",$refrs)
                ->get();

        }else if($goodtype!="All" && $refrs=="All"){
            $allEnquiryList = DB::table('tbl_enquiry')
                ->select('cn_no','cust_name','cust_contact','cust_email','enq_status','created_at')
                ->where("isdelete","0")
                ->where("enquiry_type",$goodtype)
                ->get();
        }else if($goodtype!="All" && $refrs!="All"){
            $allEnquiryList = DB::table('tbl_enquiry')
                ->select('cn_no','cust_name','cust_contact','cust_email','enq_status','created_at')
                ->where("isdelete","0")
                ->where("enquiry_type",$goodtype)
                ->where("reference",$refrs)
                ->get();

        }else{
            $allEnquiryList = DB::table('tbl_enquiry')
                ->select('cn_no','cust_name','cust_contact','cust_email','enq_status','created_at')
                ->where("isdelete","0")
                ->get();
        }
        $data = [];
        $i=0;
        foreach ($allEnquiryList as $item) {
            $data[$i] = [$item->cn_no,
                ucwords($item->cust_name),
                $item->cust_contact,
                $item->cust_email,
                date('d-m-Y',strtotime($item->created_at)),
                $item->enq_status
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly enquiry report view
    public function surveyReportPage(Request $request){
        $surveyReportData = "";
        if($request->input('submit')=="surveyReport"){
            $from_date = date("Y-m-d", strtotime($request->input('from_date')));
            $to_date = date("Y-m-d", strtotime($request->input('to_date')));

            $surveyReportData = DB::table('tbl_survey')
                ->select('tbl_survey.*','tbl_enquiry.cust_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
                ->where("tbl_survey.isdelete","0")
                ->whereBetween('tbl_survey.created_at', array($from_date, $to_date))
                ->get();
        }
        return view('reports.surveyReportPageView',compact('surveyReportData'));
    }

    //Ajax Call for enquiry reoprt
    public function getSurveyReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        $allSurveyPlan = DB::table('tbl_survey')
            ->select('tbl_survey.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
            ->where("tbl_survey.isdelete","0")
            ->whereBetween('tbl_survey.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($allSurveyPlan as $item) {
            $data[$i] = [$item->cn_no,
                ucwords($item->cust_name),
                date('d-m-Y',strtotime($item->survey_date)),
                $item->total_costing_amt,
                $item->total_pack_mat_amt,
                $item->total_quot_amt
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly packing List report view
    public function packingListReoprtPage(Request $request){
        $packReportData = "";
        if($request->input('submit')=="packingReport"){
            $from_date = date("Y-m-d", strtotime($request->input('from_date')));
            $to_date = date("Y-m-d", strtotime($request->input('to_date')));

            $packReportData = DB::table('tbl_packing_list')
                ->select('tbl_packing_list.*','tbl_enquiry.cust_name')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_packing_list.cn_no')
                ->where("tbl_packing_list.isdelete","0")
                ->whereBetween('tbl_packing_list.created_at', array($from_date, $to_date))
                ->get();
        }
        return view('reports.packingListReoprtPageView',compact('packReportData'));
    }

    //Ajax Call for packing List reoprt
    public function getPackingListReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        $allPackingList = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_packing_list.cn_no')
            ->where("tbl_packing_list.isdelete","0")
            ->whereBetween('tbl_packing_list.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($allPackingList as $item) {
            $data[$i] = [$item->cn_no,
                ucwords($item->cust_name),
                $item->goods_value,
                date('d-m-Y',strtotime($item->created_at))
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Feedback report view
    public function feedbackReportPage(){
        return view('reports.feedbackReportPageView');
    }

    //Ajax Call for Feedback reoprt
    public function getFeedbackReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        $allFeedbackList = DB::table('tbl_feedback')
            ->select('tbl_feedback.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_feedback.cn_no')
            ->where("tbl_feedback.isdelete","0")
            ->whereBetween('tbl_feedback.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($allFeedbackList as $item) {
            $data[$i] = [$item->cn_no,
                ucwords($item->cust_name),
                $item->rating
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Feedback report view
    public function surveyPersonReportPage(){
        $survey_person_list = DB::table('users')->get();
        return view('reports.surveyPersonReportPageView',compact('survey_person_list'));
    }

    //Ajax Call for Survey Person reoprt
    public function getSurveyPersonReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));
        $survey_person = $_GET['survey_person'];

        $allList = DB::table('tbl_schedule_survey')
            ->select('tbl_schedule_survey.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_schedule_survey.cn_no')
            ->where("tbl_schedule_survey.assing_emp",$survey_person)
            ->whereBetween('tbl_schedule_survey.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($allList as $item) {
            $data[$i] = [$item->cn_no,
                ucwords($item->cust_name),
                date("Y-m-d", strtotime($item->schedule_date)),
                $item->schedule_status
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Quotation report view
    public function quotationReportPage(){
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        return view('reports.quotationReportPageView',compact('goodsRS','sourceRS'));
    }

    //Ajax Call for Quotation reoprt
    public function getQuotReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        $qutData = DB::table('tbl_quotation')
            ->select('tbl_quotation.*','tbl_enquiry.*','tbl_quotation.created_at as quot_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where("tbl_quotation.isdelete","0")
            ->whereBetween('tbl_quotation.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($qutData as $item) {
            $ins_val = (int)$item->cost_ex_ins_val;
            $goods_val =  $item->goods_value;
            $ins_amt= ($ins_val/100)*$goods_val;

            $ser_val = (int)$item->cost_ex_service_tax;
            $amount =  $item->amount;
            $ser_amt = ($ser_val/100)*$amount;

            $data[$i] = [$item->cn_no,
                ucwords($item->cust_name),
                number_format((float)$ins_amt, 2, '.', ''),
                number_format((float)$ser_amt, 2, '.', ''),
                $item->net_amount,
                date('d-m-Y',strtotime($item->quot_create))
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Transport enquiry report view
    public function transportReportPage(){
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        return view('reports.transportReportPageView',compact('goodsRS'));
    }

    //Ajax Call for Transport reoprt
    public function getTransReportData(){
        $goodtype = $_GET['good_types'];
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        if($goodtype!="All"){
            $listData = DB::table('tbl_transport_enq')
//                ->select('tbl_transport_enq.*','tbl_transport_agent.*','tbl_transport_enq.created_at as create' )
//                ->join('tbl_transport_agent', 'tbl_transport_enq.trans_agent', '=', 'tbl_transport_agent.trans_agent_name')
                ->where("tbl_transport_enq.isdelete","0")
                ->where("tbl_transport_enq.good_type",$goodtype)
                ->whereBetween('tbl_transport_enq.created_at', array($from_date, $to_date))
                ->get();

        }else{
            $listData = DB::table('tbl_transport_enq')
//                ->select('tbl_transport_enq.*','tbl_transport_agent.*','tbl_transport_enq.created_at as create')
//                ->join('tbl_transport_agent', 'tbl_transport_enq.trans_agent', '=', 'tbl_transport_agent.trans_agent_name')
                ->where("tbl_transport_enq.isdelete","0")
                ->whereBetween('tbl_transport_enq.created_at', array($from_date, $to_date))
                ->get();
        }

        $data = [];
        $i=0;
        foreach ($listData as $item) {
            $data[$i] = [
                $item->cn_no,
                ucwords($item->good_trans_agent),
                $item->good_amount,
                $item->gud_transist_time,
                $item->good_type,
                date('d-m-Y',strtotime($item->created_at))
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Transport enquiry report view
    public function deliveryReportPage(){
        $riskTypeRS = DB::table("tbl_type_of_risk")->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        $typePackRS = DB::table("tbl_type_of_packing")->get();
        return view('reports.deliveryReportPageView',compact('goodsRS','riskTypeRS','disModeRS','typePackRS'));
    }

    //Ajax Call for Delivary reoprt
    public function getDeliveryReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        $listData = DB::table('tbl_delivery')
            ->select('tbl_delivery.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
            ->where("tbl_delivery.isdelete","0")
            ->whereBetween('tbl_delivery.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($listData as $item) {
            $data[$i] = [
                $item->cn_no,
                ucwords($item->cust_name),
                $item->no_of_packages,
                $item->value_of_goods,
                date('d-m-Y',strtotime($item->created_at))
            ];
            $i++;
        }
        echo json_encode($data);
    }
//Transition Report functions starting

    //dispaly Shipping expenses report view
    public function shipExpReportPage(){
        return view('reports.shipExpReportPageView');
    }

    //Ajax Call for Shipping expenses reoprt
    public function getShipExpReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        $srcDestexpRs = DB::table('tbl_src_dest_expenss')
            ->where("tbl_src_dest_expenss.isdelete","0")
            ->whereBetween('tbl_src_dest_expenss.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($srcDestexpRs as $item) {
            $data[$i] = [
                $item->cn_no,
                $item->source_total,
                $item->dest_total,
                $item->total,
                date('d-m-Y',strtotime($item->created_at))
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Cash/Cheque Receipt  report view
    public function paymentReportPage(){
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('reports.paymentReportPageView',compact('payModeRs'));
    }

    //Ajax Call for Cash/Cheque Receipt reoprt
    public function getPayReportData(){
        $pay_mode = $_GET['pay_mode'];
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        if($pay_mode != "All"){
            $payListData = DB::table('tbl_payment_recp')
                ->select('tbl_payment_recp.*','tbl_enquiry.*','tbl_payment_recp.created_at as pay_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->where("tbl_payment_recp.isdelete","0")
                ->where("tbl_payment_recp.payment_mode",$pay_mode)
                ->whereBetween('tbl_payment_recp.created_at', array($from_date, $to_date))
                ->get();

        }else {
            $payListData = DB::table('tbl_payment_recp')
                ->select('tbl_payment_recp.*','tbl_enquiry.*','tbl_payment_recp.created_at as pay_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->where("tbl_payment_recp.isdelete","0")
                ->whereBetween('tbl_payment_recp.created_at', array($from_date, $to_date))
                ->get();
        }
        $data = [];
        $i=0;
        foreach ($payListData as $item) {
            $data[$i] = [
                $item->cn_no,
                ucwords($item->cust_name),
                $item->invoice_amt,
                $item->payment_mode,
                $item->cur_paid_amt,
                $item->narrations,
                date('d-m-Y',strtotime($item->pay_create))
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Transport Payment report view
    public function transPayReport(){
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('reports.transPayReportView',compact('payModeRs'));
    }

    //Ajax Call for Transport Payment report
    public function getTransPayReportData(){
        $pay_mode = $_GET['pay_mode'];
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        if($pay_mode != "All"){
            $payListData = DB::table('tbl_transport_payment')
                ->select('tbl_transport_payment.*','tbl_enquiry.*','tbl_transport_agent.*','tbl_transport_payment.created_at as trans_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_transport_payment.cn_no')
                ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.id')
                ->where("tbl_transport_payment.isdelete","0")
                ->where("tbl_transport_payment.payment_mode",$pay_mode)
                ->whereBetween('tbl_transport_payment.created_at', array($from_date, $to_date))
                ->get();

        }else {
            $payListData = DB::table('tbl_transport_payment')
                ->select('tbl_transport_payment.*','tbl_enquiry.*','tbl_transport_agent.*','tbl_transport_payment.created_at as trans_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_transport_payment.cn_no')
                ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.id')
                ->where("tbl_transport_payment.isdelete","0")
                ->whereBetween('tbl_transport_payment.created_at', array($from_date, $to_date))
                ->get();
        }
        $data = [];
        $i=0;
        foreach ($payListData as $item) {
            $data[$i] = [
                $item->cn_no,
                ucwords($item->trans_agent_name),
                $item->payment_mode,
                $item->amount,
                $item->trans_type,
                date('d-m-Y',strtotime($item->trans_create))
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Office expenses report view
    public function offExpReportPage(){
        $offExpCatRs = DB::table('tbl_off_exp_category')->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('reports.offExpReportPageView',compact('offExpCatRs','payModeRs'));
    }

    //Ajax Call for Office Expenses report
    public function getOffExpReportData(){
        $category = $_GET['category'];
        $pay_mode = $_GET['pay_mode'];
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        if($pay_mode != "All" && $category != "All"){
            $offExpRs = DB::table('tbl_office_expenses')
                ->select('tbl_office_expenses.*','tbl_off_exp_category.*')
                ->join('tbl_off_exp_category', 'tbl_off_exp_category.id', '=', 'tbl_office_expenses.category')
                ->where("tbl_office_expenses.isdelete","0")
                ->where("tbl_office_expenses.payment_mode",$pay_mode)
                ->where("tbl_office_expenses.category_name",$category)
                ->whereBetween('tbl_office_expenses.created_at', array($from_date, $to_date))
                ->get();

        }else if($pay_mode == "All" && $category != "All"){
            $offExpRs = DB::table('tbl_office_expenses')
                ->select('tbl_office_expenses.*','tbl_off_exp_category.*')
                ->join('tbl_off_exp_category', 'tbl_off_exp_category.id', '=', 'tbl_office_expenses.category')
                ->where("tbl_office_expenses.isdelete","0")
                ->where("tbl_office_expenses.category_name",$category)
                ->whereBetween('tbl_office_expenses.created_at', array($from_date, $to_date))
                ->get();

        }else if($pay_mode != "All" && $category == "All"){
            $offExpRs = DB::table('tbl_office_expenses')
                ->select('tbl_office_expenses.*','tbl_off_exp_category.*')
                ->join('tbl_off_exp_category', 'tbl_off_exp_category.id', '=', 'tbl_office_expenses.category')
                ->where("tbl_office_expenses.isdelete","0")
                ->where("tbl_office_expenses.payment_mode",$pay_mode)
                ->whereBetween('tbl_office_expenses.created_at', array($from_date, $to_date))
                ->get();

        }else {
            $offExpRs = DB::table('tbl_office_expenses')
                ->select('tbl_office_expenses.*','tbl_off_exp_category.*')
                ->join('tbl_off_exp_category', 'tbl_off_exp_category.id', '=', 'tbl_office_expenses.category')
                ->where("tbl_office_expenses.isdelete","0")
                ->whereBetween('tbl_office_expenses.created_at', array($from_date, $to_date))
                ->get();
        }
        $data = [];
        $i=0;
        foreach ($offExpRs as $item) {
            $data[$i] = [
                ucwords($item->category_name),
                $item->expenes_by,
                $item->amount,
                $item->payment_mode,
                date('d-m-Y',strtotime($item->created_at))
            ];
            $i++;
        }
        echo json_encode($data);
    }

//Analysis Report functions starting

    //dispaly insurance report view
    public function insuranceReportPage(){
        return view('reports.insuranceReportPageView');
    }

    //Ajax Call for Insurance reoprt
    public function getinsuranceReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        $qutData = DB::table('tbl_quotation')
            ->select('tbl_quotation.*','tbl_enquiry.*','tbl_quotation.created_at as quot_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where("tbl_quotation.isdelete","0")
            ->where("tbl_quotation.cost_type","cost_include2")
            ->whereBetween('tbl_quotation.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($qutData as $item) {
            $temp_per = (int)$item->cost_ex_ins_val/100;
            $temp_ins_val = $temp_per * $item->goods_value;
            $data[$i] = [
                $item->cn_no,
                ucwords($item->cust_name),
                $item->goods_value,
                (int)$item->cost_ex_ins_val,
                $temp_ins_val,
                date('d-m-Y',strtotime($item->created_at))
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly TDS report view
    public function tdsReportPage(){
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('reports.tdsReportPageView',compact('payModeRs'));
    }

    //Ajax Call for TDS reoprt
    public function getTdsReportData(){
        $pay_mode = $_GET['pay_mode'];
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        if($pay_mode != "All"){
            $payListData = DB::table('tbl_payment_recp')
                ->select('tbl_payment_recp.*','tbl_enquiry.*','tbl_payment_recp.created_at as pay_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->where("tbl_payment_recp.isdelete","0")
                ->where("tbl_payment_recp.payment_mode",$pay_mode)
                ->whereBetween('tbl_payment_recp.created_at', array($from_date, $to_date))
                ->get();

        }else {
            $payListData = DB::table('tbl_payment_recp')
                ->select('tbl_payment_recp.*','tbl_enquiry.*','tbl_payment_recp.created_at as pay_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->where("tbl_payment_recp.isdelete","0")
                ->whereBetween('tbl_payment_recp.created_at', array($from_date, $to_date))
                ->get();
        }
        $data = [];
        $i=0;
        foreach ($payListData as $item) {
            if($item->cur_tds > 0){
                $data[$i] = [
                    $item->cn_no,
                    ucwords($item->cust_name),
                    $item->payment_mode,
                    $item->cur_tds,
                    date('d-m-Y',strtotime($item->pay_create))
                ];
                $i++;
            }

        }
        echo json_encode($data);
    }

    //dispaly Profit Sheet report view
    public function profitSheetReoprtPage(){
        return view('reports.profitSheetReoprtPageView');
    }

    //Ajax Call for Profit Sheet reoprt
    public function getProfitSheetReportData(){
        $cn_no =$_GET['cn_no'];
        $qutData = DB::table('tbl_enquiry')
            ->select('tbl_invoice.*','tbl_quotation.*','tbl_enquiry.*','tbl_src_dest_expenss.*','tbl_enquiry_customer_details.*','tbl_invoice.created_at as inv_create','tbl_invoice.id as inv_id','tbl_enquiry.cn_no as cnno')
            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->join('tbl_quotation', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->join('tbl_invoice', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
            ->join('tbl_src_dest_expenss', 'tbl_enquiry.cn_no', '=', 'tbl_src_dest_expenss.cn_no')
            ->where("tbl_enquiry.cn_no",$cn_no)
            ->get();

        foreach ($qutData as $item) {}
        echo json_encode($item);
    }

    //dispaly CityWise report view
    public function cityWiseReportPage(){
        $srcCity = DB::table('tbl_enquiry')->select("source")->groupBy('source')->get();
        $destCity = DB::table('tbl_enquiry')->select("destination")->groupBy('destination')->get();
        return view('reports.cityWiseReportPageView',compact('srcCity','destCity'));
    }

    //Ajax Call for City Wise reoprt
    public function getCityWiseReportData(){
        $src_city = $_GET['src_city'];
        $dest_city = $_GET['dest_city'];


        $allEnquiryList = DB::table('tbl_enquiry')
                ->select('tbl_enquiry.*')
                ->where("isdelete","0")
                ->where("source",$src_city)
                ->where("destination",$dest_city)
                ->get();
             $data = [];
        $i=0;
        foreach ($allEnquiryList as $item) {
            $data[$i] = [$item->cn_no,
                ucwords($item->cust_name),
                $item->source,
                $item->destination
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly Service Tax  report view
    public function serviceTaxReportPage(){
        return view('reports.serviceTaxReportPageView');
    }

    //Ajax Call for Service Tax reoprt
    public function getServiceTaxReportData(){
        $from_date = date("Y-m-d", strtotime($_GET['from_date']));
        $to_date = date("Y-m-d", strtotime($_GET['to_date']));

        $qutData = DB::table('tbl_invoice')
            ->select('tbl_invoice.*','tbl_quotation.*','tbl_enquiry.*','tbl_invoice.created_at as inv_create')
            ->join('tbl_quotation', 'tbl_invoice.cn_no', '=', 'tbl_quotation.cn_no')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where("tbl_invoice.isdelete","0")
            ->where("tbl_quotation.cost_type","cost_include2")
            ->whereBetween('tbl_invoice.created_at', array($from_date, $to_date))
            ->get();

        $data = [];
        $i=0;
        foreach ($qutData as $item) {
            $temp_per = (int)$item->cost_ex_service_tax/100;
            $temp_tax_val = $temp_per * $item->net_amount;
            $data[$i] = [
                $item->cn_no,
                ucwords($item->cust_name),
                (int)$item->cost_ex_service_tax,
                $temp_tax_val,
                $item->invoice_amount,
                date('d-m-Y',strtotime($item->inv_create))
            ];
            $i++;
        }
        echo json_encode($data);
    }

    //dispaly document printing view
    public function documentPrintingPage(){
        return view('reports.documentPrintingPageView');
    }

    //dispaly document printing view
    public function surveyPrinting(){
        $id =0;
//        return view('reports.surveyPrintingView',compact('id'));
        Redirect::away("reports.surveyPrintingView",compact('id'));
    }

    public function printingPage(Request $request){
        $input = $request->all();
        $cn_no= $request->input('cn_no');
        if($request->input('submit')=="surveyPrint") {
            $enquiryData = DB::table('tbl_survey')
                ->select('tbl_survey.*','tbl_enquiry.*','tbl_survey_costing.*','tbl_survey_packing_mate.*','mst_tbl_vehical_details.*', 'tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
                ->join('mst_tbl_vehical_details', 'mst_tbl_vehical_details.vehical_id', '=', 'tbl_enquiry_shiping_details.exp_vehical')
                ->join('tbl_survey_costing', 'tbl_survey_costing.survey_id', '=', 'tbl_survey.survey_id')
                ->join('tbl_survey_packing_mate', 'tbl_survey_packing_mate.survey_id', '=', 'tbl_survey.survey_id')
                ->where("tbl_survey.cn_no",$cn_no)
                ->get();
            foreach($enquiryData as $surveyData){

            }
            return view('PrintPage.surveyPrintingView', compact('surveyData'));
        }

        if($request->input('submit')=="packListPrint") {
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $enquiryRs = DB::table('tbl_enquiry')
                ->select('tbl_enquiry.*','tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*' )
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
                ->where("tbl_enquiry.cn_no", $cn_no)
                ->get();
            foreach ($enquiryRs as $enquiryData) { }
            return view('PrintPage.packListPrintView', compact('enquiryData','companyDetails'));
        }

        if($request->input('submit')=="quotationPrint") {
            $compRs = DB::table("tbl_company_Details")->get();
            $quotRs = DB::table("tbl_quotation")
                ->select("tbl_quotation.*",'tbl_survey.*','tbl_survey_costing.*','tbl_enquiry.*','tbl_enquiry_customer_details.*','tbl_quotation.created_at as quotCreate','tbl_enquiry_shiping_details.total_cft','tbl_enquiry_shiping_details.kilometer')
                ->join('tbl_survey','tbl_survey.cn_no','=','tbl_quotation.cn_no')
                ->join('tbl_survey_costing','tbl_survey_costing.survey_id','=','tbl_survey.survey_id')
                ->join('tbl_enquiry','tbl_enquiry.cn_no','=','tbl_quotation.cn_no')
                ->join('tbl_enquiry_customer_details','tbl_enquiry_customer_details.enq_id','=','tbl_enquiry.enq_id')
                ->join('tbl_enquiry_shiping_details','tbl_enquiry_shiping_details.last_eq_id','=','tbl_enquiry.enq_id')
                ->where('tbl_quotation.cn_no',$cn_no)
                ->get();
            foreach ($compRs as $companyDetails){}
            foreach ($quotRs as $quotData){}
            $articalsRs = DB::table("tbl_enquiry")
                ->select('tbl_enquiry.*','tbl_enquiry_articals_list.*','mst_tbl_home_equipment.*')
                ->join('tbl_enquiry_articals_list','tbl_enquiry_articals_list.enq_id','=','tbl_enquiry.enq_id')
                ->join('mst_tbl_home_equipment','mst_tbl_home_equipment.home_eq_id','=','tbl_enquiry_articals_list.artical_id')
                ->where('tbl_enquiry.cn_no',$cn_no)
                ->get();
            $amtInWord = $this->getIndianCurrency((int)$quotData->net_amount);
            return view('PrintPage.quotationPrintView', compact('companyDetails','quotData','articalsRs','amtInWord'));
        }

        if($request->input('submit')=="invoicePrint") {
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $enquiryData = DB::table('tbl_invoice')
                ->select('tbl_invoice.*','tbl_enquiry.*',"tbl_quotation.*", 'tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*','tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_quotation.created_at as quotCreate' )
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
                ->join('tbl_quotation', 'tbl_quotation.cn_no', '=', 'tbl_invoice.cn_no')
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
                ->where("tbl_invoice.cn_no", $cn_no)
                ->get();
            foreach ($enquiryData as $enquiryid) { }

            $surveyData = DB::table('tbl_survey')
                ->select('tbl_survey.*', 'tbl_survey_costing.*')
                ->join('tbl_survey_costing', 'tbl_survey.survey_id', '=', 'tbl_survey_costing.survey_id')
                ->where("tbl_survey.cn_no", $cn_no)
                ->get();
            foreach ($surveyData as $survey) { }

            $paymentRs = DB::table('tbl_payment_recp')
                ->where("cn_no", $cn_no)
                ->orderBy("rcp_id","desc")
                ->take(1)
                ->get();
            $wordCount = $paymentRs->count();
            if($wordCount>=1) {
                foreach ($paymentRs as $paymentData) {
                }
                $amtInWord = $this->getIndianCurrency((int)$paymentData->bal_amt);
            }else{
                $paymentData=array();
                $amtInWord = $this->getIndianCurrency((int)$enquiryid->invoice_amount);
            }
            $invoice_setting = DB::table('tbl_invoice_setting')
                ->get();
            foreach ($invoice_setting as $inv_setting) { }
            return view('PrintPage.invoicePrintView', compact('companyDetails','enquiryid','survey','paymentData','amtInWord','inv_setting'));
        }
        if($request->input('submit')=="cashRecPrint") {
            $rcp_id = $request->input('rcp_id');
//            echo $cn_no;die;
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $PayRecpRs = DB::table('tbl_payment_recp')
                ->select('tbl_payment_recp.*','tbl_enquiry.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_payment_recp.created_at as rcpCreate' )
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->where("tbl_payment_recp.rcp_id", $cn_no)
//                ->orderBy("tbl_payment_recp.rcp_id","desc")
//                ->take(1)
                ->get();
            foreach ($PayRecpRs as $PayRecpData) { }
            $amtInWord = $this->getIndianCurrency((int)$PayRecpData->cur_paid_amt);
            return view('PrintPage.cashRecPrintView', compact('companyDetails','PayRecpData','amtInWord'));
        }

        if($request->input('submit')=="transPayPrint") {
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $PayRecpRs = DB::table('tbl_transport_payment')
                ->select('tbl_transport_payment.*','tbl_transport_agent.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_transport_payment.created_at as trpCreate' )
                ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_transport_payment.cn_no')
                ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.trans_agent_name')
                ->where("tbl_transport_payment.trp_id", $cn_no)
//                ->orderBy("tbl_transport_payment.trp_id","desc")
//                ->take(1)
                ->get();
            foreach ($PayRecpRs as $PayRecpData) { }

//        return view('sales.sendTrasportPayReceipt',compact('companyDetails','PayRecpData'));
            return view('PrintPage.transPayPrintView', compact('companyDetails','PayRecpData'));
        }

        if($request->input('submit')=="offExpPrint") {
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $offExpRs = DB::table('tbl_office_expenses')
                ->select('tbl_office_expenses.*')
                ->where("tbl_office_expenses.id", $cn_no)
                ->get();
            foreach ($offExpRs as $offExpData) { }
            return view('PrintPage.offExpPrintView', compact('companyDetails','offExpData'));
        }

        if($request->input('submit')=="delDetailsPrint") {
            $listRs = DB::table('tbl_delivery')
                ->select('tbl_delivery.*','tbl_enquiry.*', 'tbl_enquiry_customer_details.*')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->where("tbl_delivery.cn_no",$cn_no)
                ->get();
            foreach ($listRs as $listData){}
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            return view('PrintPage.delDetailsPrintView',compact('listData','companyDetails'));
        }

        if($request->input('submit')=="feedbackPrint") {
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $enquiryRs = DB::table('tbl_enquiry')
                ->select('tbl_enquiry.*','tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*' )
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
                ->where("tbl_enquiry.cn_no", $cn_no)
                ->get();
            foreach ($enquiryRs as $enquiryData) { }
            $feedback_data = DB::table('tbl_feedback')->where('cn_no',$cn_no)->first();
            return view('PrintPage.feedbackPrintView', compact('feedback_data','enquiryData','companyDetails'));
        }



    }
    // get amount in words
    public function getIndianCurrency($number) {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? '' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else
                $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal) ? "&" . ' Paise ' . ($words[$decimal / 10] . " " . $words[$decimal % 10]) : '';
        return ucwords(($Rupees ? 'Rs. ' . $Rupees : '') . $paise . " " . 'only');
    }
}