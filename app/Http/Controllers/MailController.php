<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use PDF;

class MailController extends Controller
{
    public function getSurveyEditData(){
        $cn_no = "201905231";
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
        print_r($survey);
    }
    public function deliveryPageForm(){
        $listRs = DB::table('tbl_delivery')
            ->select('tbl_delivery.*','tbl_enquiry.*', 'tbl_enquiry_customer_details.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->where("tbl_delivery.cn_no","201905031")
            ->get();
        foreach ($listRs as $listData){}
        $compRs = DB::table("tbl_company_Details")->get();
        foreach ($compRs as $companyDetails){}
        return view('delivery.deliveryFormPageView',compact('listData','companyDetails'));

    }
    public function sendTransPayRec(){
        $cn_no = '201905031';
        $trp_id = '1';
        $file_name = $cn_no."_".date("dm")."_".date("hi").".pdf";
        $compRs = DB::table("tbl_company_Details")->get();
        foreach ($compRs as $companyDetails){}
        $PayRecpRs = DB::table('tbl_transport_payment')
            ->select('tbl_transport_payment.*','tbl_transport_agent.*',"tbl_invoice.*",'tbl_invoice.created_at as invCreate','tbl_invoice.id as invid','tbl_transport_payment.created_at as trpCreate' )
            ->join('tbl_invoice', 'tbl_invoice.cn_no', '=', 'tbl_transport_payment.cn_no')
            ->join('tbl_transport_agent', 'tbl_transport_payment.payment_to', '=', 'tbl_transport_agent.id')
            ->where("tbl_transport_payment.trp_id", $trp_id)
            ->get();
        foreach ($PayRecpRs as $PayRecpData) { }

//        return view('sales.transportPayPdf',compact('companyDetails','PayRecpData','trp_id'));
//        $pdf = PDF::loadView('sales.sendTrasportPayReceipt',compact('companyDetails','PayRecpData'))->save('public/TransPayReceiptPDF/'.$file_name) ;
//        return $pdf->download();
//
        $to_name = "harshad";
        $to_email = "harshad@puretechnology.in";
        $data = array("body" => "Hello test Invoice");
        Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email,$file_name,$companyDetails,$PayRecpData) {
            $pdf = PDF::loadView('sales.transportPayPdf',compact('companyDetails','PayRecpData'));
            $message->to($to_email, $to_name)
                ->subject('Invoice');
            $message->from('harshad@puretechnology.in','Safemove');
            $message->attachData($pdf->output(),$file_name);
        });
//        echo " ";
    }
    public function sendPayRec(){
        $cn_no = '201905171';
        $rcp_id = '1';
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

//        return view('sales.paymentReceiptPdf',compact('companyDetails','PayRecpData','rcp_id'));
//        $pdf = PDF::loadView('sales.sendPaymentReceipt',compact('companyDetails','PayRecpData'))->save('public/PaymentReceiptPDF/'.$file_name) ;
//        return $pdf->download();
//
        $to_name = ucwords($PayRecpData->cust_name);
        $to_email = $PayRecpData->cust_email;
        $data = array("body" => "Hello test Payment");
        Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email,$file_name,$companyDetails,$PayRecpData) {
            $pdf = PDF::loadView('sales.paymentReceiptPdf',compact('companyDetails','PayRecpData'));
            $message->to($to_email, $to_name)
                ->subject('Invoice');
            $message->from('harshad@puretechnology.in','Safemove');
            $message->attachData($pdf->output(),$file_name);
        });
//        echo " ";
    }

    public function sendInvoice(){
        $cn_no = '201905182';
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


//        return view('sales.invoicePdf',compact('companyDetails','enquiryid','survey','paymentData','amtInWord'));

//        $pdf = PDF::loadView('invoiceTemplate',compact('companyDetails','enquiryid','survey','paymentData','amtInWord'))->save('public/InvoicePDF/'.$file_name) ;
//        return $pdf->download();
//
//        $to_name = ucwords($enquiryid->cust_name);
//        $to_email = $enquiryid->cust_email;
//        $data = array("body" => "Hello test Invoice");
//        Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email,$file_name,$companyDetails,$enquiryid,$survey,$paymentData,$amtInWord) {
//            $pdf = PDF::loadView('sales.invoicePdf',compact('companyDetails','enquiryid','survey','paymentData','amtInWord'));
//            $message->to($to_email, $to_name)
//                ->subject('Invoice');
//            $message->from('harshad@puretechnology.in','Safemove');
//            $message->attachData($pdf->output(),$file_name);
//        });
//        echo " ";
    }
    public function sendQuot(){
        $cn_no = '201905182';
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
        foreach ($quotRs as $quotData){}
        $articalsRs = DB::table("tbl_enquiry")
            ->select('tbl_enquiry.*','tbl_enquiry_articals_list.*','mst_tbl_home_equipment.*')
            ->join('tbl_enquiry_articals_list','tbl_enquiry_articals_list.enq_id','=','tbl_enquiry.enq_id')
            ->join('mst_tbl_home_equipment','mst_tbl_home_equipment.home_eq_id','=','tbl_enquiry_articals_list.artical_id')
            ->where('tbl_enquiry.cn_no',$cn_no)
            ->get();
//        return view('sales.quotationPdf',compact('companyDetails','quotData','articalsRs'));
//        $pdf = PDF::loadView('sales.quotationPdf',compact('companyDetails','quotData','articalsRs'))->save('public/QuotationPDF/'.$file_name) ;
//        return $pdf->download();

        $to_name = 'Harshad';
        $to_email = 'harshad@puretechnology.in';
        $data = array("body" => "Hello test quotation");
        Mail::send(['html'=>'mail'], $data, function($message) use ($to_name, $to_email,$file_name,$companyDetails,$quotData,$articalsRs) {
            $pdf = PDF::loadView('sales.quotationPdf',compact('companyDetails','quotData','articalsRs')) ;
            $message->to($to_email, $to_name)
                ->subject('test');
            $message->from('harshad@puretechnology.in','Safemove');
            $message->attachData($pdf->output(),$file_name);
//            $message->attach('public/QuotationPDF/', [
//                'as' => '201904251_0353.pdf',
//                'mime' => 'application/pdf'
//            ]);
        });
//        echo " ";
    }

    public function send(){

        function getDistance($source,$destination,$unit){
            $api_key = "AIzaSyCFVXZqTyVzzubHEY0rldHnncxXsQeTGPg";

            $formattedAddrFrom = str_replace('',"+",$source);
            $formattedAddrTo = str_replace('',"+",$destination);

            $geocodeFrom = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$formattedAddrFrom."&sensor=false&key=".$api_key);
            $outputFrom = json_decode($geocodeFrom);
            if(!empty($outputFrom->error_message)){
                return $outputFrom->error_message;
            }

            $geocodeTo = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$formattedAddrTo."&sensor=false&key=".$api_key);
            $outputTo = json_decode($geocodeTo);
            if(!empty($outputTo->error_message)){
                return $outputTo->error_message;
            }

            $latitudeFrom = $outputFrom->result[0]->geometry->location->lat;
            $longitudeFrom = $outputFrom->result[0]->geometry->location->lag;

            $latitudeTo = $outputTo->result[0]->geometry->location->lat;
            $longitudeTo = $outputTo->result[0]->geometry->location->lag;

            $theta = $longitudeFrom-$longitudeTo;
            $dist = sin(deg2rad($latitudeFrom))*sin(deg2rad($latitudeTo))+cos(deg2rad($latitudeFrom))*cos(deg2rad($latitudeTo))*cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist*60*1.1515;

            return round($miles*1.609344,2).'km';
        }

        $src = 'Cypress,Hills,Brooklyn,NY,USA';
        $dest = 'Ozone Park,Queens,NY,USA';
        $distance = getDistance($src,$dest,'k');

        echo $distance;

//        $cn_no = "201904101";
//        $enquiryData = DB::table('tbl_enquiry')
//            ->select('tbl_enquiry.*', 'tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*')
//            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
//            ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
//            ->where("tbl_enquiry.cn_no", $cn_no)
//            ->get();
//        foreach ($enquiryData as $enquiryid) {
//
//        }
//
//        $surveyData = DB::table('tbl_survey')
//            ->select('tbl_survey.*', 'tbl_survey_costing.*')
//            ->join('tbl_survey_costing', 'tbl_survey.survey_id', '=', 'tbl_survey_costing.survey_id')
//            ->where("tbl_survey.cn_no", $cn_no)
//            ->get();
//        foreach ($surveyData as $survey) {
//
//        }
//        $to_name = 'Yogesh';
//        $to_email = 'harshad@puretechnology.in';
//        $data = array("enquiryid" => $enquiryid);
//        Mail::send(['html'=>'invoiceTemplate'], $data, function($message) use ($to_name, $to_email) {
//            $message->to($to_email, $to_name)
//                ->subject('test mail');
//            $message->from('harshad@puretechnology.in','Safemove');
//        });

//        return view('invoiceTemplate',compact('enquiryid','survey'));



//        $emailBodyrs = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'add enquiry')->get();
//        $name = ucwords($to_name);
//        $cn_no = "2019041011";
//        foreach($emailBodyrs as $emaildate){
//            $emailbody=$emaildate->email_body;
//            eval("\$emailbody = \"$emailbody\";");
//        }
//        $data = array("body" => $emailbody);
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

    public function getKilometer(){
        $latitudeFrom = 20.90;
        $longitudeFrom = 74.77;

        $latitudeTo = 20.56;
        $longitudeTo = 74.52;

        $theta = $longitudeFrom-$longitudeTo;
        $dist = sin(deg2rad($latitudeFrom))*sin(deg2rad($latitudeTo))+cos(deg2rad($latitudeFrom))*cos(deg2rad($latitudeTo))*cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist*60*1.1515;

        echo round($miles*1.609344,2).'km';

//        echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
//        echo distance(20.90, 74.77, 20.56, 74.52, "K") . " Kilometers<br>";
//        echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
    }
}