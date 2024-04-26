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
use App\DeliveryModel;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;



class DeliveryController extends Controller
{
    private $activities;
    protected $foo;
    public function __construct(Foo $foo){
        $this->foo = $foo;
    }

    public function deliveryPage(){
        $listData = DB::table('tbl_delivery')
            ->select('tbl_delivery.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
            ->where("tbl_delivery.isdelete","0")
            ->orderBy('tbl_delivery.del_id', 'desc')
            ->get();
        $riskTypeRS = DB::table("tbl_type_of_risk")->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        $typePackRS = DB::table("tbl_type_of_packing")->get();
        $delIdRs = DB::table('tbl_delivery')->select('del_id')->orderBy('del_id', 'desc')->take(1)->get();
        foreach($delIdRs as $delIdData){
            $delId=$delIdData->del_id;
        }
        if(empty($delId)){ $delId=1;}else{$delId++;}
        return view('delivery.deliveryPageView',compact('listData','typePackRS','disModeRS','riskTypeRS','delId'));
    }
    public function addDelivery(Request $request){
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
            'value_of_goods' => 'required',
            'truck_no' => 'required',
            'no_of_packages' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'value_of_goods.required' => 'Goods value is required.',
            'truck_no.required' => 'Truck number is required.',
            'no_of_packages.required' => 'No of packages is required.',
        ]);

        $deliveryData= array(
            'cn_no' => $request->input('consignment_no'),
            'truck_no' => $request->input('truck_no'),
            'no_of_packages' => $request->input('no_of_packages'),
            'value_of_goods' => $request->input('value_of_goods'),
            'type_of_packing' => $request->input('type_of_packing'),
            'mode_of_dispatch' => $request->input('mode_of_dispatch'),
            'risk_type' => $request->input('risk_type'),
            'private_mark' => $request->input('private_mark'),
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'isdelete' => 0
        );

        if(DeliveryModel::create($deliveryData)){
            $listRs = DB::table('tbl_delivery')
                ->select('tbl_delivery.*','tbl_enquiry.*', 'tbl_enquiry_customer_details.*')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
                ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
                ->where("tbl_delivery.cn_no",$request->input('consignment_no'))
                ->get();
            foreach ($listRs as $listData){}
            $compRs = DB::table("tbl_company_Details")->get();
            foreach ($compRs as $companyDetails){}
            return view('delivery.deliveryFormPageView',compact('listData','companyDetails'));

        }else{
            $message = 'Record Inserted Not Successfully.';
            $listData = DB::table('tbl_delivery')
                ->select('tbl_delivery.*','tbl_enquiry.*')
                ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
                ->where("tbl_delivery.isdelete","0")
                ->orderBy('tbl_delivery.del_id', 'desc')
                ->get();
            $riskTypeRS = DB::table("tbl_type_of_risk")->get();
            $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
            $typePackRS = DB::table("tbl_type_of_packing")->get();
            return view('delivery.deliveryPageView',compact('listData','typePackRS','disModeRS','riskTypeRS','message'));
        }


    }
    //Display Delivery data
    public function displaydeliveryDetails($cn_no){
//        $listRs = DB::table('tbl_delivery')
//            ->select('tbl_delivery.*','tbl_enquiry.*','tbl_delivery.created_at as del_cre')
//            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
//            ->where('tbl_delivery.del_id', base64_decode($del_id))
//            ->get();
//        foreach ($listRs as $listData){}
//        return view('delivery.displayDeliveryView',compact('listData'));
        $listRs = DB::table('tbl_delivery')
            ->select('tbl_delivery.*','tbl_enquiry.*', 'tbl_enquiry_customer_details.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->where("tbl_delivery.cn_no",base64_decode($cn_no))
            ->get();
        foreach ($listRs as $listData){}
        $compRs = DB::table("tbl_company_Details")->get();
        foreach ($compRs as $companyDetails){}
        return view('PrintPage.delDetailsPrintView',compact('listData','companyDetails'));
    }

    //edit Delivery data
    public function editDelivery($del_id){
        $listData = DB::table('tbl_delivery')
            ->select('tbl_delivery.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
            ->where('tbl_delivery.del_id', base64_decode($del_id))
            ->get();
        $riskTypeRS = DB::table("tbl_type_of_risk")->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        $typePackRS = DB::table("tbl_type_of_packing")->get();
        return view('delivery.editDeliveryView',compact('listData','typePackRS','disModeRS','riskTypeRS'));
    }
    // Update delivery data
    public function updateDelivery(Request $request){
        $input = $request->all();
        $del_id = $request->input('del_id');
        $validator = $request->validate([
            'value_of_goods' => 'required',
            'truck_no' => 'required',
            'no_of_packages' => 'required',
        ], [
            'value_of_goods.required' => 'Goods value is required.',
            'truck_no.required' => 'Truck number is required.',
            'no_of_packages.required' => 'No of packages is required.',
        ]);

        $deliveryData= array(
            'truck_no' => $request->input('truck_no'),
            'no_of_packages' => $request->input('no_of_packages'),
            'value_of_goods' => $request->input('value_of_goods'),
            'type_of_packing' => $request->input('type_of_packing'),
            'mode_of_dispatch' => $request->input('mode_of_dispatch'),
            'risk_type' => $request->input('risk_type'),
            'private_mark' => $request->input('private_mark'),
            'updated_by' => Auth::user()->id
        );

        if(DeliveryModel::where('del_id', $del_id)->update($deliveryData)){
            $message = 'Update Successfully.';
        }else{
            $message = ' Update Not Successfully.';
        }

        $listData = DB::table('tbl_delivery')
            ->select('tbl_delivery.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
            ->where("tbl_delivery.isdelete","0")
            ->orderBy('tbl_delivery.del_id', 'desc')
            ->get();
        $riskTypeRS = DB::table("tbl_type_of_risk")->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        $typePackRS = DB::table("tbl_type_of_packing")->get();
        return view('delivery.deliveryPageView',compact('listData','typePackRS','disModeRS','riskTypeRS','message'));
    }

    // Delete Delivery details
    public function deliveryDestroy($del_id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(DeliveryModel::where('del_id', base64_decode($del_id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $listData = DB::table('tbl_delivery')
            ->select('tbl_delivery.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
            ->where("tbl_delivery.isdelete","0")
            ->orderBy('tbl_delivery.del_id', 'desc')
            ->get();
        $riskTypeRS = DB::table("tbl_type_of_risk")->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        $typePackRS = DB::table("tbl_type_of_packing")->get();
        return view('delivery.deliveryPageView',compact('listData','typePackRS','disModeRS','riskTypeRS','message'));
    }

    public function sendPrintDelivaryForm(Request $request){
        $input = $request->all();
        if("saveBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        if("printBtn"== $request->input('submit')) {
            $message = 'Record Inserted Successfully.';
        }
        $listData = DB::table('tbl_delivery')
            ->select('tbl_delivery.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_delivery.cn_no')
            ->where("tbl_delivery.isdelete","0")
            ->orderBy('tbl_delivery.del_id', 'desc')
            ->get();
        $riskTypeRS = DB::table("tbl_type_of_risk")->get();
        $disModeRS = DB::table("tbl_mode_of_dispatched")->get();
        $typePackRS = DB::table("tbl_type_of_packing")->get();
        $delIdRs = DB::table('tbl_delivery')->select('del_id')->orderBy('del_id', 'desc')->take(1)->get();
        foreach($delIdRs as $delIdData){
            $delId=$delIdData->del_id;
        }
        if(empty($delId)){ $delId=1;}else{$delId++;}
        return view('delivery.deliveryPageView',compact('listData','typePackRS','disModeRS','riskTypeRS','delId','message'));
    }

    //ajax call for get delivery data
    public function getDeliveryData(){
        $cnno =$_GET['cn_no'];
        $enquiryData = DB::table('tbl_enquiry')
            ->select('tbl_enquiry.*','mst_tbl_vehical_details.*', 'tbl_enquiry_customer_details.*', 'tbl_enquiry_shiping_details.*','tbl_survey.*','tbl_transport_payment.trans_type')
            ->join('tbl_enquiry_customer_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_customer_details.enq_id')
            ->join('tbl_enquiry_shiping_details', 'tbl_enquiry.enq_id', '=', 'tbl_enquiry_shiping_details.last_eq_id')
            ->join('mst_tbl_vehical_details', 'mst_tbl_vehical_details.vehical_id', '=', 'tbl_enquiry_shiping_details.exp_vehical')
            ->join('tbl_survey', 'tbl_enquiry.cn_no', '=', 'tbl_survey.cn_no')
            ->join('tbl_transport_payment', 'tbl_enquiry.cn_no', '=', 'tbl_transport_payment.cn_no')
            ->where("tbl_enquiry.cn_no", $cnno)
            ->get();
         
        foreach ($enquiryData as $enquiryid) {

        }
        echo json_encode($enquiryid);
    }



}
?>