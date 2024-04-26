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
use App\PackingListModel;
use App\PackingImageModel;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;



class PackingController extends Controller
{
    private $activities;
    protected $foo;
    public function __construct(Foo $foo){
        $this->foo = $foo;
    }

    public function packingListPage(){
        $allPAckingList = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_packing_list.cn_no')
            ->where("tbl_packing_list.isdelete","0")
            ->orderBy('tbl_packing_list.pl_id', 'desc')
            ->get();
        $pl_idCnId = DB::table('tbl_packing_list')->select('pl_id')->orderBy('pl_id', 'desc')->take(1)->get();
        foreach($pl_idCnId as $pl_idData){
            $pl_id=$pl_idData->pl_id;
        }
        if(empty($pl_id)){ $pl_id=1;}else{$pl_id++;}
        return view('packing.packingListPageView',compact('allPAckingList','pl_id'));
    }

    public function addPackingList(Request $request){
        $input = $request->all();
        $validator = $request->validate([
            'consignment_no' => 'required',
        ], [
            'consignment_no.required' => 'Consignment number is required.',
        ]);
        $packingRs = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*')
            ->where('tbl_packing_list.cn_no',$request->input('consignment_no'))
            ->get();
        $count = $packingRs->count();
        if($count>=1) {
            $pl_id = $request->input('packing_list_no');
            $packListData= array(
                'supervisor_name' => $request->input('supervisor_name'),
                'packer_name1' => $request->input('packer_name_1'),
                'packer_name2' => $request->input('packer_name_2'),
                'packer_name3' => $request->input('packer_name_3'),
                'packer_name4' => $request->input('packer_name_4'),
                'packer_name5' => $request->input('packer_name_5'),
                'packer_name6' => $request->input('packer_name_6'),
                'goods_value' => $request->input('total_goods_value'),
                'updated_by' => Auth::user()->id
            );

            if(PackingListModel::where('pl_id', $pl_id)->update($packListData)){

                $packing_image = $request->file('packing_image');
                $count = count($packing_image);
                if($count>0) {
                    for ($i = 0; $i < $count; $i++) {
                        $image = $packing_image[$i];
                        $name = rand() . '_' . $request->input('consignment_no') . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/PackingImage');
                        if ($image->move($destinationPath, $name)) {
                            $imgData = array(
                                'cn_no' => $request->input('consignment_no'),
                                'upload_image' => $name,
                                'isdelete' => 0
                            );
                            PackingImageModel::create($imgData);
                        }
                    }
                }
                $message = 'Record Update Successfully.';
            }else{
                $message = 'Record Update Not Successfully.';
            }

        }else{
            $packListData = array(
                'cn_no' => $request->input('consignment_no'),
                'supervisor_name' => $request->input('supervisor_name'),
                'packer_name1' => $request->input('packer_name_1'),
                'packer_name2' => $request->input('packer_name_2'),
                'packer_name3' => $request->input('packer_name_3'),
                'packer_name4' => $request->input('packer_name_4'),
                'packer_name5' => $request->input('packer_name_5'),
                'packer_name6' => $request->input('packer_name_6'),
                'goods_value' => $request->input('total_goods_value'),
                'created_by' => Auth::user()->id,
                'isdelete' => 0
            );

            if (PackingListModel::create($packListData)) {
                $packing_image = $request->file('packing_image');
                $count = count($packing_image);
                for($i=0;$i<$count;$i++) {
                    $image = $packing_image[$i];
                    $name = rand() . '_' . $request->input('consignment_no') . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/PackingImage');
                    if($image->move($destinationPath, $name)){
                        $imgData = array(
                            'cn_no' => $request->input('consignment_no'),
                            'upload_image' => $name,
                            'isdelete' => 0
                        );
                        PackingImageModel::create($imgData);
                    }
                }
                $message = 'Record Inserted Successfully.';
            } else {
                $message = 'Record Inserted Not Successfully.';
            }
        }

        $allPAckingList = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_packing_list.cn_no')
            ->where("tbl_packing_list.isdelete","0")
            ->orderBy('tbl_packing_list.pl_id', 'desc')
            ->get();
        $pl_idCnId = DB::table('tbl_packing_list')->select('pl_id')->orderBy('pl_id', 'desc')->take(1)->get();
        foreach($pl_idCnId as $pl_idData){
            $pl_id=$pl_idData->pl_id;
        }
        if(empty($pl_id)){ $pl_id=1;}else{$pl_id++;}
        return view('packing.packingListPageView',compact('allPAckingList','pl_id','message'));
    }

    //edit Packing list data
    public function packingListEdit($pl_id){
        $listData = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_packing_list.cn_no')
            ->where('pl_id', base64_decode($pl_id))
            ->get();
        return view('packing.editPackingList',compact('listData'));
    }

    public function updatePackingList(Request $request){
        $input = $request->all();
        $pl_id = $request->input('pl_id');
        $packListData= array(
            'supervisor_name' => $request->input('supervisor_name'),
            'packer_name1' => $request->input('packer_name_1'),
            'packer_name2' => $request->input('packer_name_2'),
            'packer_name3' => $request->input('packer_name_3'),
            'packer_name4' => $request->input('packer_name_4'),
            'packer_name5' => $request->input('packer_name_5'),
            'packer_name6' => $request->input('packer_name_6'),
            'updated_by' => Auth::user()->id
        );

        if(PackingListModel::where('pl_id', $pl_id)->update($packListData)){
            $message = 'Record Update Successfully.';
        }else{
            $message = 'Record Update Not Successfully.';
        }
        $allPAckingList = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_packing_list.cn_no')
            ->where("tbl_packing_list.isdelete","0")
            ->orderBy('tbl_packing_list.pl_id', 'desc')
            ->get();
        $pl_idCnId = DB::table('tbl_packing_list')->select('pl_id')->orderBy('pl_id', 'desc')->take(1)->get();
        foreach($pl_idCnId as $pl_idData){
            $pl_id=$pl_idData->pl_id;
        }
        if(empty($pl_id)){ $pl_id=1;}else{$pl_id++;}
        return view('packing.packingListPageView',compact('allPAckingList','pl_id','message'));
    }

    // Delete Packing details
    public function packingDestroy($pl_id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);

        if(PackingListModel::where('pl_id', base64_decode($pl_id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }

        $allPAckingList = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_enquiry.cust_name')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_packing_list.cn_no')
            ->where("tbl_packing_list.isdelete","0")
            ->orderBy('tbl_packing_list.pl_id', 'desc')
            ->get();
        $pl_idCnId = DB::table('tbl_packing_list')->select('pl_id')->orderBy('pl_id', 'desc')->take(1)->get();
        foreach($pl_idCnId as $pl_idData){
            $pl_id=$pl_idData->pl_id;
        }
        if(empty($pl_id)){ $pl_id=1;}else{$pl_id++;}
        return view('packing.packingListPageView',compact('allPAckingList','pl_id','message'));
    }

    //Display enquiry details function
    public function packingListDetails($pl_id){
        $packlistrs = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_packing_list.created_at as plcat','tbl_packing_list.updated_at as plupat','users1.first_name as u1fst','users1.last_name as u1lst','users2.first_name as u2fst','users1.last_name as u2lst')
            ->join('users as users1', 'tbl_packing_list.created_by', '=', 'users1.id')
            ->join('users as users2', 'tbl_packing_list.updated_by', '=', 'users2.id')
            ->where('tbl_packing_list.pl_id', base64_decode($pl_id))
            ->get();
        if($packlistrs->count() <=0){
            $packlistrs = DB::table('tbl_packing_list')
                ->select('tbl_packing_list.*','tbl_packing_list.created_at as plcat','tbl_packing_list.updated_at as plupat','users1.first_name as u1fst','users1.last_name as u1lst')
                ->join('users as users1', 'tbl_packing_list.created_by', '=', 'users1.id')
                ->where('tbl_packing_list.pl_id', base64_decode($pl_id))
                ->get();
                foreach ($packlistrs as $packListData) {
                }
        }else {
            foreach ($packlistrs as $packListData) {
            }
        }
        $packingImage = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_packing_list_image.*')
            ->join('tbl_packing_list_image', 'tbl_packing_list.cn_no', '=', 'tbl_packing_list_image.cn_no')
            ->where('tbl_packing_list.pl_id', base64_decode($pl_id))
            ->get();
        $count = $packingImage->count();
        if($count>=1) {
            return view('packing.packingListDetailsView', compact('packListData', 'packingImage'));
        }else{
            return view('packing.packingListDetailsView', compact('packListData'));
        }
    }

    public function checkPackingListData(){
        $cn_no = $_GET['cn_no'];
        $packingRs = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_packing_list.cn_no')
            ->where('tbl_packing_list.cn_no',$cn_no)
            ->get();
        $count = $packingRs->count();
        if($count>=1) {
            foreach ($packingRs as $packListData) {
            }
            echo json_encode($packListData);
        }else{
            echo "1";
        }
    }

    public function getIamgeData(){
        $cn_no = $_GET['cn_no'];
        $packingImage = DB::table('tbl_packing_list')
            ->select('tbl_packing_list.*','tbl_packing_list_image.*')
            ->join('tbl_packing_list_image', 'tbl_packing_list.cn_no', '=', 'tbl_packing_list_image.cn_no')
            ->where('tbl_packing_list.cn_no', $cn_no)
            ->get();
        $count = $packingImage->count();
        if($count>=1) {
            foreach($packingImage as $image) {

               echo  '<div class="form-group" >
                          <div class="form-group col-md-4" >
                                <a target = "_blank" href = "https://safemovecrm.in/public/PackingImage/'.$image->upload_image.'"  style = "border: none;" ><img src = "https://safemovecrm.in/public/PackingImage/'.$image->upload_image.'" style = "width: 80%;" ></a >
                          </div >
                      </div >';
             }
        }else{
            echo "1";
        }
    }

    public function getPackingData(){
        $cn_no = $_GET['cn_no'];
        $packingRs = DB::table('tbl_quotation')
            ->select('tbl_quotation.*','tbl_enquiry.*')
            ->join('tbl_enquiry', 'tbl_enquiry.cn_no', '=', 'tbl_quotation.cn_no')
            ->where('tbl_quotation.cn_no',$cn_no)
            ->get();
        foreach ($packingRs as $packListData) {
            }
        echo json_encode($packListData);

    }

}
?>