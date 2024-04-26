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
use App\QuotationTerms;
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



class SalesController extends Controller
{
    private $activities;
	protected $foo;
	public function __construct(Foo $foo){		 
	   $this->foo = $foo;
    }

    // Dispaly Invoice Page
    public function invoicePage(){
        $invCnId = DB::table('tbl_invoice')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($invCnId as $invIdData){
            $invId=$invIdData->id;
        }
        if(empty($invId)){ $invId=0;}{$invId++;}
        if(Auth::user()->role == "Admin") {
            $invData = DB::table('tbl_invoice')
                ->select('tbl_invoice.*', 'tbl_enquiry.*', 'tbl_invoice.created_at as inv_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
                ->where("tbl_invoice.isdelete", "0")
                ->orderBy('tbl_invoice.id', 'desc')
                ->get();

        }else{
            $invData = DB::table('tbl_invoice')
                ->select('tbl_invoice.*', 'tbl_enquiry.*', 'tbl_invoice.created_at as inv_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
                ->where("tbl_invoice.isdelete", "0")
                ->where("tbl_invoice.created_by", Auth::user()->id)
                ->orderBy('tbl_invoice.id', 'desc')
                ->get();
        }

        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.invoicePageView',compact('invData','invId','payModeRs'));
    }

    // Add Invoice data
    public function addInvoice(Request $request){
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
            'invoice_amount' => 'required',
            'payment_mode' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'invoice_amount.required' => 'Invoice Amount is required.',
            'payment_mode.required' => 'Payment Mode is required.',
        ]);

        $invoiceData= array(
            'cn_no' => $request->input('consignment_no'),
            'pur_order_no' => $request->input('pur_order_no'),
            'pur_order_date' => date("Y-m-d",strtotime($request->input('purches_date'))),
            'invoice_amount' => $request->input('invoice_amount'),
            'payment_mode' => $request->input('payment_mode'),
            'invoice_status' => 'Generated',
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'isdelete' => 0
        );

        if(InvoiceModel::create($invoiceData)){
            $cn_no = $request->input('consignment_no');
            $file_name = $cn_no."_".date("dm")."_".date("hi").".pdf";
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
            return view('sales.invoiceTemplate',compact('companyDetails','enquiryid','survey','paymentData','amtInWord','inv_setting'));


        }else{
            $message = 'Record Inserted Not Successfully.';
            $invCnId = DB::table('tbl_invoice')->select('id')->orderBy('id', 'desc')->take(1)->get();
            foreach($invCnId as $invIdData){
                $invId=$invIdData->id;
            }
            if(empty($invId)){ $invId=0;}{$invId++;}
            $invData = DB::table('tbl_invoice')
                ->select('tbl_invoice.*','tbl_enquiry.*','tbl_invoice.created_at as inv_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
                ->where("tbl_invoice.isdelete","0")
                ->orderBy('tbl_invoice.id', 'desc')
                ->get();

            $payModeRs = DB::table('tbl_payment_mode')->get();
            return view('sales.invoicePageView',compact('invData','invId','payModeRs','message'));
        }
    }

    public function sendPrintInvoice(Request $request){
        $input = $request->all();
        if("saveBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        if("sendBtn"== $request->input('submit')) {
            $cn_no = $request->input('consignment_no');
//            $cn_no = "201905031";
            $file_name = $cn_no."_".date("dm")."_".date("hi").".pdf";
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

//            $pdf = PDF::loadView('sales.invoiceTemplate',compact('companyDetails','enquiryid','survey','paymentData','amtInWord'))->save('public/InvoicePDF/'.$file_name) ;
//        return $pdf->download();

            $to_name = ucwords($enquiryid->cust_name);
            $to_email = $enquiryid->cust_email;

            $emailBodyrs = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'Send Invoice')->get();
            $cn_no = $request->input('consignment_no');
            foreach($emailBodyrs as $emaildate){
                $emailbody=$emaildate->email_body;
                eval("\$emailbody = \"$emailbody\";");
            }
            $data = array("body" => $emailbody);
            Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email,$file_name,$companyDetails,$enquiryid,$survey,$paymentData,$amtInWord,$inv_setting) {
                $pdf = PDF::loadView('sales.invoicePdf',compact('companyDetails','enquiryid','survey','paymentData','amtInWord','inv_setting'));
                $message->to($to_email, $to_name)
                    ->subject('Invoice');
                $message->from('contact@safemove.in','Safemove');
                $message->attachData($pdf->output(),$file_name);
//                $message->attach('public/InvoicePDF/', [
//                    'as' => $file_name,
//                    'mime' => 'application/pdf'
//                ]);
            });
            $data= array('invoice_status'=>'Send','updated_by' => Auth::user()->id);
            InvoiceModel::where('cn_no', $request->input('consignment_no'))->update($data);

//            $data= array('schedule_status'=>'Send Invoice','updated_by' => Auth::user()->id);
//            ScheduleSurveyModel::where('cn_no', $request->input('consignment_no'))->update($data);
//
//            $data= array('survey_status'=>'Send Invoice','updated_by' => Auth::user()->id);
//            SurveyModel::where('cn_no', $request->input('consignment_no'))->update($data);
//
//            $data= array('quot_status'=>'Send Invoice','updated_by' => Auth::user()->id);
//            QuotationModel::where('cn_no', $request->input('consignment_no'))->update($data);

            $message = 'Invoice Send Successfully.';
        }
        if("printBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        $invCnId = DB::table('tbl_invoice')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($invCnId as $invIdData){
            $invId=$invIdData->id;
        }
        if(empty($invId)){ $invId=0;}{$invId++;}
        $invData = DB::table('tbl_invoice')
            ->select('tbl_invoice.*','tbl_enquiry.*','tbl_invoice.created_at as inv_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
            ->where("tbl_invoice.isdelete","0")
            ->orderBy('tbl_invoice.id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.invoicePageView',compact('invData','invId','payModeRs','message'));
    }

    //edit Edit Invoice Details data
    public function editInvoice($id){
        $invData = DB::table('tbl_invoice')
            ->select('tbl_invoice.*','tbl_enquiry.*','tbl_invoice.created_at as inv_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
            ->where('tbl_invoice.id', base64_decode($id))
            ->get();
        return view('sales.editInvoiceView',compact('invData'));
    }

    // Update Invoice Details
    public function updateInvoice(Request $request){
        $input = $request->all();
        $inv_id = $request->input('inv_id');
        $validator = $request->validate([
            'consignment_no' => 'required',
            'purches_date' => 'required',
            'invoice_amount' => 'required',
            'payment_mode' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'purches_date.required' => 'Purches Date is required.',
            'invoice_amount.required' => 'Invoice Amount is required.',
            'payment_mode.required' => 'Payment Mode is required.',
        ]);

        $invoiceData= array(
            'pur_order_no' => $request->input('pur_order_no'),
            'pur_order_date' => date("Y-m-d",strtotime($request->input('purches_date'))),
            'invoice_amount' => $request->input('invoice_amount'),
            'payment_mode' => $request->input('payment_mode'),
            'updated_by' => Auth::user()->id
        );

        if(InvoiceModel::where('id', $inv_id)->update($invoiceData)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Not Updated Successfully.';
        }
        $invCnId = DB::table('tbl_invoice')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($invCnId as $invIdData){
            $invId=$invIdData->id;
        }
        if(empty($invId)){ $invId=0;}{$invId++;}
        $invData = DB::table('tbl_invoice')
            ->select('tbl_invoice.*','tbl_enquiry.*','tbl_invoice.created_at as inv_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
            ->where("tbl_invoice.isdelete","0")
            ->orderBy('tbl_invoice.id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.invoicePageView',compact('invData','invId','payModeRs','message'));
    }

    //delete invoice details
    public function invoiceDestroy($id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(InvoiceModel::where('id', base64_decode($id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $invCnId = DB::table('tbl_invoice')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($invCnId as $invIdData){
            $invId=$invIdData->id;
        }
        if(empty($invId)){ $invId=0;}{$invId++;}
        $invData = DB::table('tbl_invoice')
            ->select('tbl_invoice.*','tbl_enquiry.*','tbl_invoice.created_at as inv_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_invoice.cn_no')
            ->where("tbl_invoice.isdelete","0")
            ->orderBy('tbl_invoice.id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.invoicePageView',compact('invData','invId','payModeRs','message'));
    }


    // Dispaly Quotation Page
    public function quotationPage(){
        $quotCnId = DB::table('tbl_quotation')->select('quot_id')->orderBy('quot_id', 'desc')->take(1)->get();
        foreach($quotCnId as $quotCnIdData){
            $quotId=$quotCnIdData->quot_id;
        }
        if(empty($quotId)){ $quotId=0;}{$quotId++;}

        if(Auth::user()->role == "Admin") {
            $qutData = DB::table('tbl_quotation')
                ->select('tbl_quotation.*', 'tbl_enquiry.*', 'tbl_quotation.created_at as quot_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
                ->where("tbl_quotation.isdelete", "0")
                ->orderBy('tbl_quotation.quot_id', 'desc')
                ->get();
        }else{
            $qutData = DB::table('tbl_quotation')
                ->select('tbl_quotation.*', 'tbl_enquiry.*', 'tbl_quotation.created_at as quot_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
                ->where("tbl_quotation.isdelete", "0")
                ->where("tbl_quotation.created_by", Auth::user()->id)
                ->orderBy('tbl_quotation.quot_id', 'desc')
                ->get();
        }
        return view('sales.quotationPageView',compact('qutData','quotId'));
    }

    // Add Quotation data
    public function addQuotation(Request $request){
        $val1 = 0;
        $val2 = 0;
        $addFlag=0;
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
            'net_amount' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'net_amount.required' => 'Net Amount is required.',
        ]);
        $cost_type = $request->input('cost_radio');
        $quotation1= DB::table('tbl_quotation')
            ->where("cn_no",$request->input('consignment_no'))
            ->get();
        $quotation= DB::table('tbl_quotation')
            ->where("cn_no",$request->input('consignment_no'))
            ->first();
        $count=count($quotation1);
        if($count>=1){
            $quotData= array(
                'cn_no' => $request->input('consignment_no'),
                'transport_by' => $request->input('transport_by'),
                'km'=> $request->input('kilometer'),
                'amount' => $request->input('amount'),
                'goods_value' => $request->input('goods_value'),
                'discount' => $request->input('discount'),
                'other' => $request->input('other_amount'),
                'time_req_for_packing' => $request->input('timerequired'),
                'prior_notice' => $request->input('priornotice'),
                'transist_time' => $request->input('transitday'),
                'payment_terms' => $request->input('paymentterm'),
                'net_amount' => $request->input('net_amount'),
                'after_insurance_amnt' => $request->input('after_insurance_amnt'),
                'after_service_tax' => $request->input('after_service_tax'),
                'cost_type' => $request->input('cost_radio'),
                'updated_by' => Auth::user()->id
            );

            if($cost_type=="cost_include1"){
                $temp_cost = $request->input('cost_include_value1');
                $pos1= strpos($temp_cost,"@");
                $per_pos1= strpos($temp_cost,"%");
                for($i=$pos1+1;$i<$per_pos1;$i++){
                    $val1 = $val1.$temp_cost[$i];
                }

                $pos2= strrpos($temp_cost,"@");
                $per_pos2= strrpos($temp_cost,"%");
                for($i=$pos2+1;$i<$per_pos2;$i++){
                    $val2 = $val2.$temp_cost[$i];
                }

                $quotData['cost_in_freight_val'] = $val1;
                $quotData['cost_in_service_tax'] = $val2;

            }else{
                $quotData['cost_ex_ins_val'] = $request->input('cost_exclude_value1');
                $quotData['cost_ex_service_tax'] = $request->input('cost_exclude_value2');
            }
            if(QuotationModel::where('cn_no', $request->input('consignment_no'))->update($quotData)){
//                QuotationTerms::where('quot_id',$quotation->quot_id)->delete();
                $terms_and_cond = $request->input('terms_and_cond');
                for($i=0;$i<count($terms_and_cond);$i++){
                     
                    QuotationTerms::create(array(
                        'quot_id'=>$quotation->quot_id,
                        'terms_cond'=>$terms_and_cond[$i]
                    ));
                }
                $addFlag=1;
            }else{
                $addFlag=0;
            }
        }else{
            $quotData= array(
                'cn_no' => $request->input('consignment_no'),
                'transport_by' => $request->input('transport_by'),
                'km'=> $request->input('kilometer'),
                'amount' => $request->input('amount'),
                'goods_value' => $request->input('goods_value'),
                'discount' => $request->input('discount'),
                'other' => $request->input('other_amount'),
                'time_req_for_packing' => $request->input('timerequired'),
                'prior_notice' => $request->input('priornotice'),
                'transist_time' => $request->input('transitday'),
                'payment_terms' => $request->input('paymentterm'),
                'net_amount' => $request->input('net_amount'),
                'after_insurance_amnt' => $request->input('after_insurance_amnt'),
                'after_service_tax' => $request->input('after_service_tax'),
                'cost_type' => $request->input('cost_radio'),
                'quot_status'=>"Generated",
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'isdelete' => 0
            );

            if($cost_type=="cost_include1"){
                $temp_cost = $request->input('cost_include_value1');
                $pos1= strpos($temp_cost,"@");
                $per_pos1= strpos($temp_cost,"%");
                for($i=$pos1+1;$i<$per_pos1;$i++){
                    $val1 = $val1.$temp_cost[$i];
                }

                $pos2= strrpos($temp_cost,"@");
                $per_pos2= strrpos($temp_cost,"%");
                for($i=$pos2+1;$i<$per_pos2;$i++){
                    $val2 = $val2.$temp_cost[$i];
                }

                $quotData['cost_in_freight_val'] = $val1;
                $quotData['cost_in_service_tax'] = $val2;

            }else{
                $quotData['cost_ex_ins_val'] = $request->input('cost_exclude_value1');
                $quotData['cost_ex_service_tax'] = $request->input('cost_exclude_value2');
            }

            if(QuotationModel::create($quotData)){
                $last_id = DB::getPdo()->lastInsertId();
                $terms_and_cond = $request->input('terms_and_cond');
                for($i=0;$i<count($terms_and_cond);$i++){
                    QuotationTerms::create(array(
                        'quot_id'=>$last_id,
                        'terms_cond'=>$terms_and_cond[$i]
                    ));
                }
                $addFlag=1;
            }else{
                $addFlag=0;
            }

        }

        if($addFlag==1){
            // sending quotation to the customer
            $cn_no = $request->input('consignment_no');
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
            $quot_terms = DB::table("tbl_quotation_terms_condn")->where('quot_id',$quotData->quot_id)->get();
            return view('sales.sendQuotationPage',compact('companyDetails','quotData','articalsRs','amtInWord','quot_terms'));

        }else{
            $message = 'Record Inserted Not Successfully.';
            $quotCnId = DB::table('tbl_quotation')->select('quot_id')->orderBy('quot_id', 'desc')->take(1)->get();
            foreach($quotCnId as $quotCnIdData){
                $quotId=$quotCnIdData->quot_id;
            }
            if(empty($quotId)){ $quotId=0;}{$quotId++;}
            $qutData = DB::table('tbl_quotation')
                ->select('tbl_quotation.*','tbl_enquiry.*','tbl_quotation.created_at as quot_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
                ->where("tbl_quotation.isdelete","0")
                ->orderBy('tbl_quotation.quot_id', 'desc')
                ->get();

            return view('sales.quotationPageView',compact('qutData','quotId','message'));
        }
    }

    public function sendPrintQuotation(Request $request){
        $input = $request->all();
        if("saveBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        if("sendBtn"== $request->input('submit')) {

            $cn_no = $request->input('consignment_no');
            $file_name = $cn_no."_".date("hi").".pdf";
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
            $quot_terms = DB::table("tbl_quotation_terms_condn")->where('quot_id',$quotData->quot_id)->get();
//            $pdf = PDF::loadView('sales.sendQuotationPage',compact('companyDetails','quotData','articalsRs'))->save('public/QuotationPDF/'.$file_name) ;
            $to_name = ucwords($quotData->cust_name);
            $to_email = $quotData->cust_email;
            $emailBodyrs = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'Send quotation')->get();
            $cn_no = $request->input('consignment_no');
			//dd($cn_no);
            foreach($emailBodyrs as $emaildate){
                $emailbody=$emaildate->email_body;
                eval("\$emailbody = \"$emailbody\";");
            }
            $data = array("body" => $emailbody);

            Mail::send(['html'=>'mail'], $data, function($message) use ($to_name,$cn_no,$to_email,$file_name,$companyDetails,$quotData,$quot_terms,$articalsRs,$amtInWord) {
                $pdf = PDF::loadView('sales.quotationPdf',compact('companyDetails','quotData','articalsRs','amtInWord','quot_terms')) ;
                $message->to($to_email, $to_name)
                    ->subject('Quotation #'.$to_name. ' #' . $cn_no);
                $message->from('contact@safemove.in','Safemove');
                $message->attachData($pdf->output(),$file_name);
                $message->attach('public/uploads/safemove profile.pdf', [
                    'as' => 'safemove profile.pdf',
                    'mime' => 'application/pdf'
                ]);
            });

            $data= array('quot_status'=>'Send','updated_by' => Auth::user()->id);
            QuotationModel::where('cn_no', $request->input('consignment_no'))->update($data);

            $message = 'Quotation Send Successfully.';
        }
        if("printBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        $quotCnId = DB::table('tbl_quotation')->select('quot_id')->orderBy('quot_id', 'desc')->take(1)->get();
        foreach($quotCnId as $quotCnIdData){
            $quotId=$quotCnIdData->quot_id;
        }
        if(empty($quotId)){ $quotId=0;}else{$quotId++;}
        $qutData = DB::table('tbl_quotation')
            ->select('tbl_quotation.*','tbl_enquiry.*','tbl_quotation.created_at as quot_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where("tbl_quotation.isdelete","0")
            ->orderBy('tbl_quotation.quot_id', 'desc')
            ->get();
        return view('sales.quotationPageView',compact('qutData','quotId','message'));
    }

    public function quotationDetails($cn_no){
    $compRs = DB::table("tbl_company_Details")->get();
        $quotRs = DB::table("tbl_quotation")
            ->select("tbl_quotation.*",'tbl_survey.*','tbl_survey_costing.*','tbl_enquiry.*','tbl_enquiry_customer_details.*','tbl_quotation.created_at as quotCreate','tbl_enquiry_shiping_details.total_cft','tbl_enquiry_shiping_details.kilometer')
            ->join('tbl_survey','tbl_survey.cn_no','=','tbl_quotation.cn_no')
            ->join('tbl_survey_costing','tbl_survey_costing.survey_id','=','tbl_survey.survey_id')
            ->join('tbl_enquiry','tbl_enquiry.cn_no','=','tbl_quotation.cn_no')
            ->join('tbl_enquiry_customer_details','tbl_enquiry_customer_details.enq_id','=','tbl_enquiry.enq_id')
            ->join('tbl_enquiry_shiping_details','tbl_enquiry_shiping_details.last_eq_id','=','tbl_enquiry.enq_id')
            ->where('tbl_quotation.cn_no',base64_decode($cn_no))
            ->get();
        foreach ($compRs as $companyDetails){}
        foreach ($quotRs as $quotData){}
        $articalsRs = DB::table("tbl_enquiry")
            ->select('tbl_enquiry.*','tbl_enquiry_articals_list.*','mst_tbl_home_equipment.*')
            ->join('tbl_enquiry_articals_list','tbl_enquiry_articals_list.enq_id','=','tbl_enquiry.enq_id')
            ->join('mst_tbl_home_equipment','mst_tbl_home_equipment.home_eq_id','=','tbl_enquiry_articals_list.artical_id')
            ->where('tbl_enquiry.cn_no',base64_decode($cn_no))
            ->get();
        $amtInWord = $this->getIndianCurrency((int)$quotData->net_amount);
        return view('PrintPage.quotationPrintView', compact('companyDetails','quotData','articalsRs','amtInWord'));
    }

    public function invoiceDetails($cn_no){
        $cn_no = base64_decode($cn_no);
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

    public function quotationDestroy($id){

        if(QuotationModel::where('quot_id', base64_decode($id))->delete()){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $quotCnId = DB::table('tbl_quotation')->select('quot_id')->orderBy('quot_id', 'desc')->take(1)->get();
        foreach($quotCnId as $quotCnIdData){
            $quotId=$quotCnIdData->quot_id;
        }
        if(empty($quotId)){ $quotId=0;}else{$quotId++;}
        $qutData = DB::table('tbl_quotation')
            ->select('tbl_quotation.*','tbl_enquiry.*','tbl_quotation.created_at as quot_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where("tbl_quotation.isdelete","0")
            ->orderBy('tbl_quotation.quot_id', 'desc')
            ->get();
        return view('sales.quotationPageView',compact('qutData','quotId','message'));
    }

    public function editQuotation($id){
        $quotData = DB::table('tbl_quotation')
            ->select('tbl_quotation.*','tbl_enquiry.*','tbl_quotation.created_at as quot_create', 'tbl_survey.*')
            ->join('tbl_survey', 'tbl_quotation.cn_no', '=', 'tbl_survey.cn_no')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where('tbl_quotation.quot_id', base64_decode($id))
            ->get();
        foreach ($quotData as $quotation)
        return view('sales.editQuotationView',compact('quotation'));
    }

    // Add Quotation data
    public function updateQuotation(Request $request){
        $val1 = 0;
        $val2 = 0;
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
            'net_amount' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'net_amount.required' => 'Net Amount is required.',
        ]);
        $cost_type = $request->input('cost_radio');
        $quotData= array(
            'cn_no' => $request->input('consignment_no'),
            'transport_by' => $request->input('transport_by'),
            'km'=> $request->input('kilometer'),
            'amount' => $request->input('amount'),
            'goods_value' => $request->input('goods_value'),
            'discount' => $request->input('discount'),
            'other' => $request->input('other_amount'),
            'time_req_for_packing' => $request->input('timerequired'),
            'prior_notice' => $request->input('priornotice'),
            'transist_time' => $request->input('transitday'),
            'payment_terms' => $request->input('paymentterm'),
            'net_amount' => $request->input('net_amount'),
            'after_insurance_amnt' => $request->input('after_insurance_amnt'),
            'after_service_tax' => $request->input('after_service_tax'),
            'cost_type' => $request->input('cost_radio'),
            'updated_by' => Auth::user()->id
        );

        if($cost_type=="cost_include1"){
            $temp_cost = $request->input('cost_include_value1');
            $pos1= strpos($temp_cost,"@");
            $per_pos1= strpos($temp_cost,"%");
            for($i=$pos1+1;$i<$per_pos1;$i++){
                $val1 = $val1.$temp_cost[$i];
            }

            $pos2= strrpos($temp_cost,"@");
            $per_pos2= strrpos($temp_cost,"%");
            for($i=$pos2+1;$i<$per_pos2;$i++){
                $val2 = $val2.$temp_cost[$i];
            }

            $quotData['cost_in_freight_val'] = $val1;
            $quotData['cost_in_service_tax'] = $val2;

        }else{
            $quotData['cost_ex_ins_val'] = $request->input('cost_exclude_value1');
            $quotData['cost_ex_service_tax'] = $request->input('cost_exclude_value2');
        }

        if(QuotationModel::where('quot_id', $request->input('quot_id'))->update($quotData)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Not Updated Successfully.';
        }
        $quotCnId = DB::table('tbl_quotation')->select('quot_id')->orderBy('quot_id', 'desc')->take(1)->get();
        foreach($quotCnId as $quotCnIdData){
            $quotId=$quotCnIdData->quot_id;
        }
        if(empty($quotId)){ $quotId=0;}{$quotId++;}
        $qutData = DB::table('tbl_quotation')
            ->select('tbl_quotation.*','tbl_enquiry.*','tbl_quotation.created_at as quot_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where("tbl_quotation.isdelete","0")
            ->orderBy('tbl_quotation.quot_id', 'desc')
            ->get();

        return view('sales.quotationPageView',compact('qutData','quotId','message'));
    }


    // Dispaly Payment Receipt Page
    public function paymentReceiptPage(){
        $payCnId = DB::table('tbl_payment_recp')->select('rcp_id')->orderBy('rcp_id', 'desc')->take(1)->get();
        foreach($payCnId as $payCnIdData){
            $rcp_id=$payCnIdData->rcp_id;
        }
        if(empty($rcp_id)){ $rcp_id=1;}else{$rcp_id++;}
        $payListData = DB::table('tbl_payment_recp')
            ->select('tbl_payment_recp.*','tbl_enquiry.*','tbl_payment_recp.created_at as pay_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
            ->where("tbl_payment_recp.isdelete","0")
            ->orderBy('tbl_payment_recp.rcp_id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.paymentReceiptPageView',compact('payListData','rcp_id','payModeRs'));
    }

    // Add payment receipt data
    public function addPaymentRecp(Request $request){
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
            'amount' => 'required',
            'payment_mode' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'amount.required' => 'Amount is required.',
            'payment_mode.required' => 'Payment Mode is required.',
        ]);
        $payRcpData= array(
            'cn_no' => $request->input('consignment_no'),
            'invoice_no' => $request->input('invoice_no'),
            'invoice_amt'=> $request->input('invoice_amount'),
            'bal_amt' => $request->input('balance_amount'),
            'previous_tds' => $request->input('previous_tds'),
            'cur_paid_amt' => $request->input('amount'),
            'cur_tds' => $request->input('current_tds'),
            'payment_mode' => $request->input('payment_mode'),
            'bank_name' => $request->input('bank_name'),
            'narrations' => $request->input('narration'),
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'isdelete' => 0
        );

        if($request->input('paid_amount')==0){
            $payRcpData['paid_amt']=$request->input('amount');
        }else{
            $payRcpData['paid_amt']=$request->input('paid_amount')+$request->input('amount');
        }

        if(PaymentModel::create($payRcpData)){
            $rcp_id = DB::getPdo()->lastInsertId();
//            $data= array('enq_status'=>'Payment','updated_by' => Auth::user()->id);
//            Enquiry::where('cn_no', $request->input('consignment_no'))->update($data);
//
//            $data= array('schedule_status'=>'Payment','updated_by' => Auth::user()->id);
//            ScheduleSurveyModel::where('cn_no', $request->input('consignment_no'))->update($data);
//
//            $data= array('survey_status'=>'Payment','updated_by' => Auth::user()->id);
//            SurveyModel::where('cn_no', $request->input('consignment_no'))->update($data);

            $cn_no = $request->input('consignment_no');;
            $file_name = $cn_no."_".date("dm")."_".date("hi").".pdf";
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $PayRecpRs = DB::table('tbl_payment_recp')
                ->select('tbl_payment_recp.*','tbl_enquiry.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_payment_recp.created_at as rcpCreate' )
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->where("tbl_payment_recp.rcp_id", $rcp_id)
                ->get();
            foreach ($PayRecpRs as $PayRecpData) { }
            $amtInWord = $this->getIndianCurrency((int)$PayRecpData->cur_paid_amt);
        return view('sales.sendPaymentReceipt',compact('companyDetails','PayRecpData','rcp_id','amtInWord'));

        }else{
            $message = 'Record Inserted Not Successfully.';
            $payCnId = DB::table('tbl_payment_recp')->select('rcp_id')->orderBy('rcp_id', 'desc')->take(1)->get();
            foreach($payCnId as $payCnIdData){
                $rcp_id=$payCnIdData->rcp_id;
            }
            if(empty($rcp_id)){ $rcp_id=0;}else{$rcp_id++;}
            $payListData = DB::table('tbl_payment_recp')
                ->select('tbl_payment_recp.*','tbl_enquiry.*','tbl_payment_recp.created_at as pay_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->where("tbl_payment_recp.isdelete","0")
                ->orderBy('tbl_payment_recp.rcp_id', 'desc')
                ->get();
            $payModeRs = DB::table('tbl_payment_mode')->get();
            return view('sales.paymentReceiptPageView',compact('payListData','rcp_id','payModeRs','message'));
        }


    }

    public function sendPrintPaymentRcp(Request $request){
        $input = $request->all();
        if("saveBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        if("sendBtn"== $request->input('submit')) {
            $rcp_id = $request->input('rcp_id');
            $cn_no = $request->input('consignment_no');
            $file_name = $cn_no."_".date("dm")."_".date("hi").".pdf";
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $PayRecpRs = DB::table('tbl_payment_recp')
                ->select('tbl_payment_recp.*','tbl_enquiry.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_payment_recp.created_at as rcpCreate' )
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_payment_recp.cn_no')
                ->where("tbl_payment_recp.rcp_id", $rcp_id)
                ->get();
            foreach ($PayRecpRs as $PayRecpData) { }
            $amtInWord = $this->getIndianCurrency((int)$PayRecpData->cur_paid_amt);

//        return view('sales.sendPaymentReceipt',compact('companyDetails','PayRecpData'));
//            $pdf = PDF::loadView('sales.sendPaymentReceipt',compact('companyDetails','PayRecpData','rcp_id'))->save('public/PaymentReceiptPDF/'.$file_name) ;
//            return $pdf->download();

            $to_name = ucwords($PayRecpData->cust_name);
            $to_email = $PayRecpData->cust_email;

            $emailBodyrs = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'Payment Receipt')->get();
            $cn_no = $request->input('consignment_no');
            foreach($emailBodyrs as $emaildate){
                $emailbody=$emaildate->email_body;
                eval("\$emailbody = \"$emailbody\";");
            }
            $data = array("body" => $emailbody);
            Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email,$file_name,$companyDetails,$PayRecpData,$rcp_id,$amtInWord) {
                $pdf = \PDF::loadView('sales.paymentReceiptPdf',compact('companyDetails','PayRecpData','rcp_id','amtInWord'));
                $message->to($to_email, $to_name)
                    ->subject('Payment Receipt');
                $message->from('contact@safemove.in','Safemove');
                $message->attachData($pdf->output(),$file_name);
//                $message->attach('public/PaymentReceiptPDF/', [
//                    'as' => $file_name,
//                    'mime' => 'application/pdf'
//                ]);
            });

            $message = 'Record Inserted Successfully.';
        }
        if("printBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        $payCnId = DB::table('tbl_payment_recp')->select('rcp_id')->orderBy('rcp_id', 'desc')->take(1)->get();
        foreach($payCnId as $payCnIdData){
            $rcp_id=$payCnIdData->rcp_id;
        }
        if(empty($rcp_id)){ $rcp_id=0;}else{$rcp_id++;}
        $payListData = DB::table('tbl_payment_recp')
            ->select('tbl_payment_recp.*','tbl_enquiry.*','tbl_payment_recp.created_at as pay_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
            ->where("tbl_payment_recp.isdelete","0")
            ->orderBy('tbl_payment_recp.rcp_id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.paymentReceiptPageView',compact('payListData','rcp_id','payModeRs','message'));
    }

    public function paymentRcpDetails($id){
        $compRs = DB::table("tbl_company_Details")->get();
        foreach ($compRs as $companyDetails){}
        $PayRecpRs = DB::table('tbl_payment_recp')
            ->select('tbl_payment_recp.*','tbl_enquiry.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_payment_recp.created_at as rcpCreate' )
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
            ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_payment_recp.cn_no')
            ->where("tbl_payment_recp.rcp_id", base64_decode($id))
//                ->orderBy("tbl_payment_recp.rcp_id","desc")
//                ->take(1)
            ->get();
        foreach ($PayRecpRs as $PayRecpData) { }
        $amtInWord = $this->getIndianCurrency((int)$PayRecpData->cur_paid_amt);
        return view('PrintPage.cashRecPrintView', compact('companyDetails','PayRecpData','amtInWord'));
    }

    // Dispaly Transport Payment Page
    public function transportPaymentPage(){
        $trpCnId = DB::table('tbl_transport_payment')->select('trp_id')->orderBy('trp_id', 'desc')->take(1)->get();
        foreach($trpCnId as $trpCnIdData){
            $trp_id=$trpCnIdData->trp_id;
        }
        if(empty($trp_id)){ $trp_id=1;}else{$trp_id++;}
        $payListData = DB::table('tbl_transport_payment')
            ->select('tbl_transport_payment.*','tbl_enquiry.*','tbl_transport_agent.*','tbl_transport_payment.created_at as trans_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_transport_payment.cn_no')
            ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.trans_agent_name')
            ->where("tbl_transport_payment.isdelete","0")
            ->orderBy('tbl_transport_payment.trp_id', 'desc')
            ->get();
        $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        return view('sales.transportPaymentPageView',compact('payListData','trp_id','trasnAgent','payModeRs','disModeRS'));
    }

    // Add Transport payment data
    public function addTransPayment(Request $request){
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
            'payment_to' => 'required',
            'amount' => 'required',
            'payment_mode' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'payment_to.required' => 'Payment To is required.',
            'amount.required' => 'Amount is required.',
            'payment_mode.required' => 'Payment Mode is required.',
        ]);
        $payData= array(
            'cn_no' => $request->input('consignment_no'),
            'payment_to' => $request->input('payment_to'),
            'trans_type'=> $request->input('transport_type'),
            'payment_mode' => $request->input('payment_mode'),
            'bank_name' => $request->input('bank_name'),
            'trans_amt' => $request->input('transportation_amount'),
            'bal_amt' => $request->input('balance_amount'),
            'amount' => $request->input('amount'),
            'narrations' => $request->input('narration'),
            'trans_status' => "Payment Paid",
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'isdelete' => 0
        );
        
        if($request->input('paid_amount')==""){
            $payData['paid_amt']=$request->input('amount');
        }else{
            $payData['paid_amt']=$request->input('paid_amount');
        }
        $trans_val = TransPaymentModel::where('cn_no',$request->input('consignment_no'))->get();
        
        if(count($trans_val)>0){
            if(TransPaymentModel::where('cn_no',$request->input('consignment_no'))->update($payData)){
            $trans_val = TransPaymentModel::where('cn_no',$request->input('consignment_no'))->first();
            $trp_id = $trans_val->trp_id;
            $cn_no =  $request->input('consignment_no');
            $file_name = $cn_no."_".date("dm")."_".date("hi").".pdf";
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $PayRecpRs = DB::table('tbl_transport_payment')
                ->select('tbl_transport_payment.*','tbl_transport_agent.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_transport_payment.created_at as trpCreate' )
                ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_transport_payment.cn_no')
                ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.trans_agent_name')
                ->where("tbl_transport_payment.cn_no", $request->input('consignment_no'))
                ->get();
            foreach ($PayRecpRs as $PayRecpData) { }

        return view('sales.sendTrasportPayReceipt',compact('companyDetails','PayRecpData','trp_id'));
        }else{
            $message = 'Record Inserted Not Successfully.';
            $trpCnId = DB::table('tbl_transport_payment')->select('trp_id')->orderBy('trp_id', 'desc')->take(1)->get();
            foreach($trpCnId as $trpCnIdData){
                $trp_id=$trpCnIdData->trp_id;
            }
            if(empty($trp_id)){ $trp_id=0;}else{$trp_id++;}
            $payListData = DB::table('tbl_transport_payment')
                ->select('tbl_transport_payment.*','tbl_enquiry.*','tbl_transport_agent.*','tbl_transport_payment.created_at as trans_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_transport_payment.cn_no')
                ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.trans_agent_name')
                ->where("tbl_transport_payment.isdelete","0")
                ->orderBy('tbl_transport_payment.trp_id', 'desc')
                ->get();
            $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
            $payModeRs = DB::table('tbl_payment_mode')->get();
            $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
            return view('sales.transportPaymentPageView',compact('payListData','trp_id','trasnAgent','payModeRs','message','disModeRS'));
        }

        }else{
        if(TransPaymentModel::create($payData)){
            $trp_id = DB::getPdo()->lastInsertId();
            $cn_no =  $request->input('consignment_no');
            $file_name = $cn_no."_".date("dm")."_".date("hi").".pdf";
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            // DB::enableQueryLog();
            $PayRecpRs = DB::table('tbl_transport_payment')
                ->select('tbl_transport_payment.*','tbl_transport_agent.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_transport_payment.created_at as trpCreate' )
                ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_transport_payment.cn_no')
                ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.trans_agent_name')
                ->where("tbl_transport_payment.trp_id", $trp_id)
                ->get();
                // dd(DB::getQueryLog());
            foreach ($PayRecpRs as $PayRecpData) { }

        return view('sales.sendTrasportPayReceipt',compact('companyDetails','PayRecpData','trp_id'));
        }else{
            $message = 'Record Inserted Not Successfully.';
            $trpCnId = DB::table('tbl_transport_payment')->select('trp_id')->orderBy('trp_id', 'desc')->take(1)->get();
            foreach($trpCnId as $trpCnIdData){
                $trp_id=$trpCnIdData->trp_id;
            }
            if(empty($trp_id)){ $trp_id=0;}else{$trp_id++;}
            $payListData = DB::table('tbl_transport_payment')
                ->select('tbl_transport_payment.*','tbl_enquiry.*','tbl_transport_agent.*','tbl_transport_payment.created_at as trans_create')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_transport_payment.cn_no')
                ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.trans_agent_name')
                ->where("tbl_transport_payment.isdelete","0")
                ->orderBy('tbl_transport_payment.trp_id', 'desc')
                ->get();
            $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
            $payModeRs = DB::table('tbl_payment_mode')->get();
            $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
            return view('sales.transportPaymentPageView',compact('payListData','trp_id','trasnAgent','payModeRs','message','disModeRS'));
        }

        }    
    }

    public function sendPrintTransPayRcp(Request $request){
        $input = $request->all();
        if("saveBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        if("sendBtn"== $request->input('submit')) {
            $trp_id = $request->input('trp_id');
            $cn_no =  $request->input('consignment_no');
            $file_name = $cn_no."_".date("dm")."_".date("hi").".pdf";
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            $PayRecpRs = DB::table('tbl_transport_payment')
                ->select('tbl_transport_payment.*','tbl_transport_agent.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_transport_payment.created_at as trpCreate' )
                ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_transport_payment.cn_no')
                ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.trans_agent_name')
                ->where("tbl_transport_payment.trp_id", $trp_id)
                ->get();
            foreach ($PayRecpRs as $PayRecpData) { }

//        return view('sales.sendTrasportPayReceipt',compact('companyDetails','PayRecpData'));
//            $pdf = PDF::loadView('sales.sendTrasportPayReceipt',compact('companyDetails','PayRecpData','trp_id'))->save('public/TransPayReceiptPDF/'.$file_name) ;
//            return $pdf->download();
//
            $to_name = ucwords($PayRecpData->contact_no);
            $to_email = $PayRecpData->contact_email;
            $emailBodyrs = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'Transport Payment Receipt')->get();
            $cn_no = $request->input('consignment_no');
            foreach($emailBodyrs as $emaildate){
                $emailbody=$emaildate->email_body;
                eval("\$emailbody = \"$emailbody\";");
            }
            $data = array("body" => $emailbody);
            Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email,$file_name,$companyDetails,$PayRecpData,$trp_id) {
                $pdf = PDF::loadView('sales.transportPayPdf',compact('companyDetails','PayRecpData','trp_id'));
                $message->to($to_email, $to_name)
                    ->subject('Transport Payment Receipt');
                $message->from('contact@safemove.in','Safemove');
                $message->attachData($pdf->output(),$file_name);
//                $message->attach('public/TransPayReceiptPDF/', [
//                    'as' => $file_name,
//                    'mime' => 'application/pdf'
//                ]);
            });

            $message = 'Record Inserted Successfully.';
        }
        if("printBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }

        $trpCnId = DB::table('tbl_transport_payment')->select('trp_id')->orderBy('trp_id', 'desc')->take(1)->get();
        foreach($trpCnId as $trpCnIdData){
            $trp_id=$trpCnIdData->trp_id;
        }
        if(empty($trp_id)){ $trp_id=1;}else{$trp_id++;}
        $payListData = DB::table('tbl_transport_payment')
            ->select('tbl_transport_payment.*','tbl_enquiry.*','tbl_transport_agent.*','tbl_transport_payment.created_at as trans_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_transport_payment.cn_no')
            ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.trans_agent_name')
            ->where("tbl_transport_payment.isdelete","0")
            ->orderBy('tbl_transport_payment.trp_id', 'desc')
            ->get();
        $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        return view('sales.transportPaymentPageView',compact('payListData','trp_id','trasnAgent','payModeRs','message','disModeRS'));
    }

    // Get Quotation Details
    public function getQuotationData(){
        $cnno = $_GET['cn_no'];
        $quotation= DB::table('tbl_quotation')
            ->select('tbl_enquiry.*', 'tbl_quotation.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where("tbl_quotation.cn_no",$cnno)
            ->get();
        $count=$quotation->count();
        if($count >=1){
            foreach ($quotation as $quotData) {
            }
            echo json_encode($quotData);
        }else{
            $quotData = DB::table('tbl_enquiry')
                ->select('tbl_enquiry.*', 'tbl_survey.*','tbl_enquiry_shiping_details.*')
                ->join('tbl_survey', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
                ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
                ->where("tbl_enquiry.cn_no", $cnno)
                ->get();
            foreach ($quotData as $enquiryid) {
            }
            echo json_encode($enquiryid);
        }
    }

    // ajax call for get payment data
    public function getPaymentData(){
        $cnno = $_GET['cn_no'];
        $paySet = DB::table('tbl_payment_recp')
            ->where("cn_no", $cnno)
            ->orderBy('rcp_id', 'desc')
            ->take(1)
            ->get();
        foreach ($paySet as $payData) {

        }

        if(!empty($payData)) {
             echo json_encode($payData);
        }else {
            $invSet = DB::table('tbl_invoice')
                ->select("id","invoice_amount")
                ->where("cn_no", $cnno)
                ->get();
            foreach ($invSet as $invID) {
                $invno= $invID->id;
                $invoice_amount = $invID->invoice_amount;
            }
            $payArray = array(
                'invoice_no' =>$invno,
                'invoice_amt'=>$invoice_amount,
                'paid_amt'=>0,
                'bal_amt'=>0,
                'previous_tds'=>0
            );
            echo json_encode($payArray);
        }
    }

    // ajax call for get transport payment data
    public function getTransPaymentData(){
        $cnno = $_GET['cn_no'];
        $paySet = DB::table('tbl_transport_payment')
            ->where("cn_no", $cnno)
            ->orderBy('trp_id', 'desc')
            ->take(1)
            ->get();
        foreach ($paySet as $payData) {

        }

        if($paySet->count()>=1) {
            echo json_encode($payData);
        }else {
            $invSet = DB::table('tbl_transport_enq')
                ->where("tbl_transport_enq.cn_no", $cnno)
                ->get();
            foreach ($invSet as $invID) {
                $trans_amount = $invID->good_amount;
            }
            $payArray = array(
                'trans_amt'=>$trans_amount,
                'paid_amt'=>0,
                'bal_amt'=>0
            );
            echo json_encode($payArray);
        }
    }

    //ajax call for get Invoice data
    public  function getInvoiceData(){
        $cnno =$_GET['cn_no'];
        $invoiceRs = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*','tbl_quotation.*')
            ->join('tbl_quotation', 'tbl_quotation.cn_no', '=', 'tbl_enquiry.cn_no')
            ->where("tbl_enquiry.cn_no", $cnno)
            ->get();
        foreach ($invoiceRs as $invoiceData) { }
        echo json_encode($invoiceData);
    }

    public  function shippingExpensesPage(){
        $shipExpCnId = DB::table('tbl_src_dest_expenss')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($shipExpCnId as $shipExpid){
            $expId=$shipExpid->id;
        }
        if(empty($expId)){ $expId=0;}{$expId++;}
        $srcDestexpRs = DB::table('tbl_src_dest_expenss')
            ->where("tbl_src_dest_expenss.isdelete","0")
            ->orderBy('tbl_src_dest_expenss.id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.shippingExpensesPageView',compact('srcDestexpRs','payModeRs','expId'));
    }

    public function ShippingSourceDataDestroy($id){
        
        if(DB::table('tbl_src_dest_expenss')->where('id', base64_decode($id))->delete()){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        $shipExpCnId = DB::table('tbl_src_dest_expenss')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($shipExpCnId as $shipExpid){
            $expId=$shipExpid->id;
        }
        if(empty($expId)){ $expId=0;}{$expId++;}
        $srcDestexpRs = DB::table('tbl_src_dest_expenss')
            ->where("tbl_src_dest_expenss.isdelete","0")
            ->orderBy('tbl_src_dest_expenss.id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.shippingExpensesPageView',compact('srcDestexpRs','payModeRs','expId'));
    }
    // Add Shipping expanses data
    public function addSrcDestShipExpanses(Request $request){
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
            'expanse_at' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'expanse_at.required' => 'Expanse at is required.',
        ]);
        $expanses_at= $request->input('expanse_at');
//        $expData= array(
//            'cn_no'=>$request->input('consignment_no'),
//            'source_total'=>$request->input('source_total'),
//            'dest_total'=>$request->input('dest_total'),
//            'total'=>$request->input('src_dest_total'),
//            'created_by' => Auth::user()->id,
//            'updated_by' => Auth::user()->id,
//            'isdelete' => 0
//        );
//        SrcDestExpenssModel::create($expData);
//        $sd_exp_id = DB::getPdo()->lastInsertId();

        $common_cost= $request->input('common_cost');
        $common_label= $request->input('common_label');
        $common_pay_mode= $request->input('common_pay_mode');
        $common_narration= $request->input('common_narration');

        if($expanses_at == "Source"){
            $expData= array(
                'cn_no'=>$request->input('consignment_no'),
                'source_total'=>$request->input('source_total'),
                'dest_total'=>$request->input('dest_total'),
                'total'=>$request->input('src_dest_total'),
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'isdelete' => 0
            );
            SrcDestExpenssModel::create($expData);
            $sd_exp_id = DB::getPdo()->lastInsertId();

            $src_cost= $request->input('src_cost');
            $src_label= $request->input('src_label');
            $src_pay_mode= $request->input('src_pay_mode');
            $src_narration= $request->input('src_narration');
            for($i=0;$i<8;$i++){
                if(!empty($src_cost[$i])){
                    $srcExpData= array(
                        'sd_exp_id'=>$sd_exp_id,
                        'cn_no'=>$request->input('consignment_no'),
                        'expense_cat'=>$src_label[$i],
                        'cost'=>$src_cost[$i],
                        'payment_mode'=>$src_pay_mode[$i],
                        'narration'=>$src_narration[$i],
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                        'isdelete' => 0
                    );

                    SourceExpenssModel::create($srcExpData);
                }
            }
            for($i=0;$i<7;$i++){
                if(!empty($common_cost[$i])){
                    $comExpData= array(
                        'sd_exp_id'=>$sd_exp_id,
                        'cn_no'=>$request->input('consignment_no'),
                        'expense_cat'=>$common_label[$i],
                        'cost'=>$common_cost[$i],
                        'payment_mode'=>$common_pay_mode[$i],
                        'narration'=>$common_narration[$i],
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                        'isdelete' => 0
                    );

                    SourceExpenssModel::create($comExpData);
                }
            }
            $message = "Recorded inserted successfully";
        }else{
            $checkExp = DB::table('tbl_src_dest_expenss')->where("cn_no",$request->input('consignment_no'))->get();
            $count = $checkExp->count();
            foreach ($checkExp as $checkExpData){}
            if($count >0){
                $expData= array(
                    'dest_total'=>$request->input('dest_total'),
                    'total'=>$request->input('src_dest_total')+$checkExpData->source_total,
                    'updated_by' => Auth::user()->id
                );
                SrcDestExpenssModel::where('id', $checkExpData->id)->update($expData);
            }
            $dest_cost= $request->input('dest_cost');
            $dest_label= $request->input('dest_label');
            $dest_pay_mode= $request->input('dest_pay_mode');
            $dest_narration= $request->input('dest_narration');

            for($i=0;$i<4;$i++){
                if(!empty($dest_cost[$i])){
                    $destExpData= array(
                        'sd_exp_id'=>$checkExpData->id,
                        'cn_no'=>$request->input('consignment_no'),
                        'expense_cat'=>$dest_label[$i],
                        'cost'=>$dest_cost[$i],
                        'payment_mode'=>$dest_pay_mode[$i],
                        'narration'=>$dest_narration[$i],
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                        'isdelete' => 0
                    );

                    DestinationExpenssModel::create($destExpData);
                }
            }
            for($i=0;$i<7;$i++){
                if(!empty($common_cost[$i])){
                    $comExpData= array(
                        'sd_exp_id'=>$checkExpData->id,
                        'cn_no'=>$request->input('consignment_no'),
                        'expense_cat'=>$common_label[$i],
                        'cost'=>$common_cost[$i],
                        'payment_mode'=>$common_pay_mode[$i],
                        'narration'=>$common_narration[$i],
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                        'isdelete' => 0
                    );

                    DestinationExpenssModel::create($comExpData);
                }
            }
            $message = "Recorded inserted successfully";
        }
        $shipExpCnId = DB::table('tbl_src_dest_expenss')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($shipExpCnId as $shipExpid){
            $expId=$shipExpid->id;
        }
        if(empty($expId)){ $expId=0;}{$expId++;}
        $srcDestexpRs = DB::table('tbl_src_dest_expenss')
            ->where("tbl_src_dest_expenss.isdelete","0")
            ->orderBy('tbl_src_dest_expenss.id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.shippingExpensesPageView',compact('srcDestexpRs','payModeRs','expId','message'));
    }

    //Display office Expenses page
    public  function officeExpensesPage(){
        $offExpCnId = DB::table('tbl_office_expenses')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($offExpCnId as $offExpid){
            $offExpId=$offExpid->id;
        }
        if(empty($offExpId)){ $offExpId=0;}{$offExpId++;}
        $offExpRs = DB::table('tbl_office_expenses')
            ->select('tbl_office_expenses.*','tbl_off_exp_category.id As cat_id','tbl_off_exp_category.category_name')
            ->join('tbl_off_exp_category', 'tbl_off_exp_category.id', '=', 'tbl_office_expenses.category')
            ->where("tbl_office_expenses.isdelete","0")
            ->orderBy('tbl_office_expenses.id', 'desc')
            ->get();
        $offExpCatRs = DB::table('tbl_off_exp_category')->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        $vehicalCat = DB::table('tbl_vehicle_category')->get();
        return view('sales.officeExpensesPageView',compact('offExpRs','offExpCatRs','payModeRs','offExpId','vehicalCat'));
    }

    // Add Office expanses data
    public function addOfficeExpanses(Request $request){
        $input = $request->all();
        $validator = $request->validate([
            'category' => 'required',
            'payment_mode' => 'required',
            'amount' => 'required',
        ], [
            'category.required' => 'Category is required.',
            'payment_mode.required' => 'Payment mode is required.',
            'amount.required' => 'Amount is required.',
        ]);

        $offExpData= array(
            'expenes_by'=>$request->input('expenses_by'),
            'payment_mode'=>$request->input('payment_mode'),
            'amount'=>$request->input('amount'),
            'narration'=>$request->input('narrations'),
            'category'=>$request->input('category'),
            'vehicle_name'=>$request->input('vehicle_name'),
            'offexp_date'=>date("Y-m-d",strtotime($request->input('entry_date'))),
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'isdelete' => 0
        );

        if($request->input('payment_mode')=="Cheque"){
            $offExpData['bank_name']=$request->input('bank_name');
        }

        if(OfficeExpensesModel::create($offExpData)){
            $message = 'Record Inserted Successfully.';
        }else{
            $message = 'Record Not Inserted Successfully.';
        }
        $offExpCnId = DB::table('tbl_office_expenses')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($offExpCnId as $offExpid){
            $offExpId=$offExpid->id;
        }
        if(empty($offExpId)){ $offExpId=0;}{$offExpId++;}
        $offExpRs = DB::table('tbl_office_expenses')
            ->select('tbl_office_expenses.*','tbl_off_exp_category.id As cat_id','tbl_off_exp_category.category_name')
            ->join('tbl_off_exp_category', 'tbl_off_exp_category.id', '=', 'tbl_office_expenses.category')
            ->where("tbl_office_expenses.isdelete","0")
            ->orderBy('tbl_office_expenses.id', 'desc')
            ->get();
        $offExpCatRs = DB::table('tbl_off_exp_category')->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        $vehicalCat = DB::table('tbl_vehicle_category')->get();
        return view('sales.officeExpensesPageView',compact('offExpRs','offExpCatRs','payModeRs','offExpId','message','vehicalCat'));
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

    //delete Transport Enquiry details
    public function transPaymentDestroy($id){

        if(TransPaymentModel::where('trp_id', base64_decode($id))->delete()){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $trpCnId = DB::table('tbl_transport_payment')->select('trp_id')->orderBy('trp_id', 'desc')->take(1)->get();
        foreach($trpCnId as $trpCnIdData){
            $trp_id=$trpCnIdData->trp_id;
        }
        if(empty($trp_id)){ $trp_id=0;}else{$trp_id++;}
        $payListData = DB::table('tbl_transport_payment')
            ->select('tbl_transport_payment.*','tbl_enquiry.*','tbl_transport_agent.*','tbl_transport_payment.created_at as trans_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_transport_payment.cn_no')
            ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.id')
            ->where("tbl_transport_payment.isdelete","0")
            ->orderBy('tbl_transport_payment.trp_id', 'desc')
            ->get();
        $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        return view('sales.transportPaymentPageView',compact('payListData','trp_id','trasnAgent','payModeRs','message','disModeRS'));
    }

    //delete payment receipt details
    public function paymentRcpDestroy($id){
        if(PaymentModel::where('rcp_id', base64_decode($id))->delete()){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $payCnId = DB::table('tbl_payment_recp')->select('rcp_id')->orderBy('rcp_id', 'desc')->take(1)->get();
        foreach($payCnId as $payCnIdData){
            $rcp_id=$payCnIdData->rcp_id;
        }
        if(empty($rcp_id)){ $rcp_id=0;}else{$rcp_id++;}
        $payListData = DB::table('tbl_payment_recp')
            ->select('tbl_payment_recp.*','tbl_enquiry.*','tbl_payment_recp.created_at as pay_create')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_payment_recp.cn_no')
            ->where("tbl_payment_recp.isdelete","0")
            ->orderBy('tbl_payment_recp.rcp_id', 'desc')
            ->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        return view('sales.paymentReceiptPageView',compact('payListData','rcp_id','payModeRs','message'));
    }

    public function getShippingSourceData($id){
        $cnno = $_GET['cn_no'];
        $quotData= DB::table('tbl_quotation')
            ->select('tbl_survey.*', 'tbl_quotation.*', 'tbl_survey_costing.*')
            ->join('tbl_survey', 'tbl_survey.cn_no', '=', 'tbl_quotation.cn_no')
            ->join('tbl_survey_costing', 'tbl_survey.survey_id', '=', 'tbl_survey_costing.survey_id')
            ->where("tbl_quotation.cn_no",$cnno)
            ->get();
//        $count=$quotation->count();
//        if($count >=1){
//            foreach ($quotation as $quotData) {
//            }
//            echo json_encode($quotData);
//        }else{
//            $quotData = DB::table('tbl_enquiry')
//                ->select('tbl_enquiry.*', 'tbl_survey.*')
//                ->join('tbl_survey', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
//                ->where("tbl_enquiry.cn_no", $cnno)
//                ->get();
            foreach ($quotData as $quotation) {
            }
            echo json_encode($quotation);
//        }
    }

    public function officeExpDestroy($id){
      
        if(OfficeExpensesModel::where('id', base64_decode($id))->delete()){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $offExpCnId = DB::table('tbl_office_expenses')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($offExpCnId as $offExpid){
            $offExpId=$offExpid->id;
        }
        if(empty($offExpId)){ $offExpId=0;}{$offExpId++;}
        $offExpRs = DB::table('tbl_office_expenses')
            ->select('tbl_office_expenses.*','tbl_off_exp_category.id As cat_id','tbl_off_exp_category.category_name')
            ->join('tbl_off_exp_category', 'tbl_off_exp_category.id', '=', 'tbl_office_expenses.category')
            ->where("tbl_office_expenses.isdelete","0")
            ->orderBy('tbl_office_expenses.id', 'desc')
            ->get();
        $offExpCatRs = DB::table('tbl_off_exp_category')->get();
        $payModeRs = DB::table('tbl_payment_mode')->get();
        $vehicalCat = DB::table('tbl_vehicle_category')->get();
        return view('sales.officeExpensesPageView',compact('offExpRs','offExpCatRs','payModeRs','offExpId','vehicalCat'));
    }
}
?>