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
use App\TransportModel;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;



class TrasnportController extends Controller
{
    private $activities;
    protected $foo;
    public function __construct(Foo $foo){
        $this->foo = $foo;
    }

    public function transportEnquiryPage(){
        $listData = DB::table('tbl_transport_enq')
            ->select('tbl_transport_enq.*')
            ->where("tbl_transport_enq.isdelete","0")
            ->orderBy('tbl_transport_enq.id', 'desc')
            ->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
        $trnsCnId = DB::table('tbl_transport_enq')->orderBy('id', 'desc')->take(1)->get();
        foreach($trnsCnId as $trnsCnIdData){
            $trpId=$trnsCnIdData->id;
        }
        if(empty($trpId)){ $trpId=1;}else{$trpId++;}
        return view('transport.transportEnquiryPageView',compact('listData','goodsRS','trasnAgent','trpId'));
    }

    public function addTransportEnquiry(Request $request){
        $input = $request->all();
        $good_types=$request->input('good_types');
        $validator = $request->validate([
            'consignment_no' => 'required',
            'good_types' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'good_types.required' => 'Goods Type is required.',
        ]);

        $list= array(
            'cn_no' => $request->input('consignment_no'),
            'good_type' => $request->input('good_types'),
            'good_trans_agent' => $request->input('good_trans_agent'),
            'vehi_trans_agent' => $request->input('good_trans_agent'),
            'good_amount' => $request->input('goods_amount'),
            'gud_transist_time' => $request->input('good_transist_time'),
            'vehi_trans_agent' => $request->input('vehi_trans_agent'),
            'vehical_amount' => $request->input('vehicle_charges'),
            'veh_tansist_time' => $request->input('vehicle_trasist_time'),
            'narration' => $request->input('narration'),
            'created_by' => Auth::user()->id,
            'isdelete' => 0
        );
//        if($request->input('good_trans_agent')!= "" && $request->input('goods_amount')!="" && $request->input('good_transist_time') != ""){
//            $listData['trans_agent'] = $request->input('good_trans_agent');
//            $listData['amount'] = $request->input('goods_amount');
//            $listData['transist_time'] = $request->input('good_transist_time');
//        }
//        if($request->input('vehi_trans_agent')!= "" && $request->input('vehicle_charges')!="" && $request->input('vehicle_trasist_time') != ""){
//            $listData['trans_agent'] = $request->input('vehi_trans_agent');
//            $listData['amount'] = $request->input('vehicle_charges');
//            $listData['transist_time'] = $request->input('vehicle_trasist_time');
//        }
        if(TransportModel::create($list)){
            $message = 'Record Inserted Successfully.';
        }else{
            $message = 'Record Inserted Not Successfully.';
        }

        $listData = DB::table('tbl_transport_enq')
            ->select('tbl_transport_enq.*')
            ->where("tbl_transport_enq.isdelete","0")
            ->orderBy('tbl_transport_enq.id', 'desc')
            ->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
        $trnsCnId = DB::table('tbl_transport_enq')->orderBy('id', 'desc')->take(1)->get();
        foreach($trnsCnId as $trnsCnIdData){
            $trpId=$trnsCnIdData->id;
        }
        if(empty($trpId)){ $trpId=1;}else{$trpId++;}
        return view('transport.transportEnquiryPageView',compact('listData','goodsRS','trasnAgent','trpId','message'));
    }

    //edit transport enquiry list data
    public function editTransEnq($te_id){
        $listData = DB::table('tbl_transport_enq')
            ->select('tbl_transport_enq.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_transport_enq.cn_no')
            ->where('tbl_transport_enq.id', base64_decode($te_id))
            ->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
        return view('transport.editTransEnqView',compact('listData','goodsRS','trasnAgent'));
    }

    public function updateTransEnq(Request $request){
        $input = $request->all();
        $te_id = $request->input('te_id');
        $good_types=$request->input('good_types');
        $validator = $request->validate([
            'consignment_no' => 'required',
            'good_types' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
            'good_types.required' => 'Goods Type is required.',
        ]);

        $listData= array(
            'good_trans_agent' => $request->input('good_trans_agent'),
            'vehi_trans_agent' => $request->input('good_trans_agent'),
            'good_amount' => $request->input('goods_amount'),
            'gud_transist_time' => $request->input('good_transist_time'),
            'vehi_trans_agent' => $request->input('vehi_trans_agent'),
            'vehical_amount' => $request->input('vehicle_charges'),
            'veh_tansist_time' => $request->input('vehicle_trasist_time'),
            'narration' => $request->input('narration'),
            'updated_by' => Auth::user()->id,
            'isdelete' => 0
        );
//        if($good_types == 'Home/Office'){
//            $listData['trans_agent'] = $request->input('good_trans_agent');
//            $listData['amount'] = $request->input('goods_amount');
//            $listData['transist_time'] = $request->input('good_transist_time');
//        }
//        if($good_types == 'Vehicle'){
//            $listData['trans_agent'] = $request->input('vehi_trans_agent');
//            $listData['amount'] = $request->input('vehicle_charges');
//            $listData['transist_time'] = $request->input('vehicle_trasist_time');
//        }

        if(TransportModel::where('id', $te_id)->update($listData)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Not Updated Successfully.';
        }
        $listData = DB::table('tbl_transport_enq')
            ->select('tbl_transport_enq.*')
            ->where("tbl_transport_enq.isdelete","0")
            ->orderBy('tbl_transport_enq.id', 'desc')
            ->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
        $trnsCnId = DB::table('tbl_transport_enq')->orderBy('id', 'desc')->take(1)->get();
        foreach($trnsCnId as $trnsCnIdData){
            $trpId=$trnsCnIdData->id;
        }
        if(empty($trpId)){ $trpId=1;}else{$trpId++;}
        return view('transport.transportEnquiryPageView',compact('listData','goodsRS','trasnAgent','trpId','message'));
    }

    // Delete Transport Enquiry details
    public function transportEnqDestroy($te_id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(TransportModel::where('id', base64_decode($te_id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $listData = DB::table('tbl_transport_enq')
            ->select('tbl_transport_enq.*')
            ->where("tbl_transport_enq.isdelete","0")
            ->orderBy('tbl_transport_enq.id', 'desc')
            ->get();
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        $trasnAgent = DB::table("tbl_transport_agent")->where('isdelete',0)->get();
        $trnsCnId = DB::table('tbl_transport_enq')->orderBy('id', 'desc')->take(1)->get();
        foreach($trnsCnId as $trnsCnIdData){
            $trpId=$trnsCnIdData->id;
        }
        if(empty($trpId)){ $trpId=1;}else{$trpId++;}
        return view('transport.transportEnquiryPageView',compact('listData','goodsRS','trasnAgent','trpId','message'));
    }

    public function getAgentData(){
        $trans_agent =$_GET['trans_agent'];
        $agent = DB::table('tbl_transport_agent')->where('id', $trans_agent)->get();
        foreach($agent as $agentData){
        }
        echo json_encode($agentData);

    }
}
?>