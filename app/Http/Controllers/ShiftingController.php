<?php

namespace App\Http\Controllers;
use MongoDB\Driver\Command;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;
use App\Http\Requests;
use App\Enquiry;
use App\EnquiryArticalsList;
use App\ShiftingAddressDetails;
use App\EnqShiftingDetails;
use App\ScheduleSurveyModel;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;
use Mail;



class ShiftingController extends Controller
{
    private $activities;
	protected $foo;
	public function __construct(Foo $foo)
	{		 
	   $this->foo = $foo;
    }

    // get cn no
    public function getCNNO($last_eq_id){
        $cn_noRS = DB::table("tbl_enquiry")->select("cn_no")->where("enq_id",$last_eq_id)->get();
        foreach ($cn_noRS as $cn_noData){
            $cn_no=$cn_noData->cn_no;
        }
        return $cn_no;
    }

    // get enquiry created user id by cn no
    public function getEnquiryUserId($cn_no){
        $cn_noRS = DB::table("tbl_enquiry")->select("created_by")->where("cn_no",$cn_no)->get();
        foreach ($cn_noRS as $cn_noData){
            $userId =$cn_noData->created_by;
        }
        return $userId;
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

    public function shiftHome(){
        $livingRoomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id','eq_name')->where("eq_type","l")->get();
        $bedroomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id','eq_name')->where("eq_type","b")->get();
        $diningRoomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id','eq_name')->where("eq_type","l")->get();
        $kitchenList = DB::table('mst_tbl_home_equipment')->select('home_eq_id','eq_name')->where("eq_type","l")->get();
        $bathroomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id','eq_name')->where("eq_type","l")->get();
        $miscellaneousList = DB::table('mst_tbl_home_equipment')->select('home_eq_id','eq_name')->where("eq_type","l")->get();
        $cbList = DB::table('mst_tbl_home_equipment')->select('home_eq_id','eq_name')->where("eq_type","l")->get();
        return view('shifting.shift_home',compact('livingRoomList','bedroomList','diningRoomList','kitchenList','bathroomList','miscellaneousList','cbList'));

    }
    
    
    public function showArticalList($id){
        $id = $_GET['id'];
        $users = DB::table('mst_tbl_home_equipment')->select('eq_name')->where("eq_type",$id)->get();
        echo '<div>';
        echo "<table width='100%'>";
        foreach($users as $user){
           echo "<tr><td>".ucWords($user->eq_name)."</td><td><input type='number' name='count_".$user->eq_name."' value='1' style='width:50px'></td>";
           echo "<td><input type='checkbox' name='room_equip[]'></td></tr>";
        }
        echo "</table> </div>";
        
    }
    
    public function addOriDest(Request $request){
        $input = $request->all();
        $submitBtn = $request->input('submit');
        if($submitBtn=="oriDsetDashboardForm"){
            $last_eq_id = $request->input('last_enq_id');
            $livingRoomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "l")->get();
            $bedroomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "b")->get();
            $diningRoomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "d")->get();
            $kitchenList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "k")->get();
            $bathroomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "bth")->get();
            $miscellaneousList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "o")->get();
            $cbList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "cb")->get();
            return view('surveyPlan.import_home_artList',compact('livingRoomList','bedroomList','diningRoomList','kitchenList','bathroomList','miscellaneousList','cbList','last_eq_id'));
        }else {
            $validator = $request->validate([
                'shiftingDate' => 'required',
                'shiftingSource' => 'required',
                'shiftingDestination' => 'required',
                'cust_name' => 'required',
                'cust_email' => 'required',
                'cust_contact' => 'required',
            ], [
                'shiftingDate.required' => 'This field is required.',
                'shiftingSource.required' => 'This field is required.',
                'shiftingDestination.required' => 'This field is required.',
                'cust_name.required' => 'This field is required.',
                'cust_email.required' => 'This field is required.',
                'cust_contact.required' => 'This field is required.',
            ]);
            $shiftingDate = $request->input('shiftingDate');
            $shiftingSource = $request->input('shiftingSource');
            $shiftingDestination = $request->input('shiftingDestination');
            $cust_name = $request->input('cust_name');
            $cust_email = $request->input('cust_email');
            $cust_contact = $request->input('cust_contact');
            $cust_alternate_no = $request->input('cust_alternate_no');
            $reference = $request->input('reference');
            $reference_status = $request->input('reference_status');
            $enquiry_type = $request->input('enquiry_type');


            $data = array(
                "exp_shifting_date" => date("Y-m-d", strtotime($shiftingDate)),
                "source" => $shiftingSource,
                "destination" => $shiftingDestination,
                "cust_name" => $cust_name,
                "cust_email" => $cust_email,
                "cust_contact" => $cust_contact,
                "cust_alt_contact" => $cust_alternate_no,
                "reference" => $reference,
                "reference_status" => $reference_status,
                "enquiry_type" => $enquiry_type,
                "created_by" => 0,
                "enq_status" => "New",
                'isdelete' => 0
            );


            Enquiry::create($data);
            $last_eq_id = DB::getPdo()->lastInsertId();
            $co_no = date("Ymd") . $last_eq_id;
            DB::table('tbl_enquiry')
                ->where('enq_id', $last_eq_id)
                ->update(['cn_no' => $co_no]);
            $livingRoomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "l")->get();
            $bedroomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "b")->get();
            $diningRoomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "d")->get();
            $kitchenList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "k")->get();
            $bathroomList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "bth")->get();
            $miscellaneousList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "o")->get();
            $cbList = DB::table('mst_tbl_home_equipment')->select('home_eq_id', 'eq_name')->where("eq_type", "cb")->get();

            if ($enquiry_type == "Home/Office") {
                return view('shifting.shift_home_artList', compact('livingRoomList', 'bedroomList', 'diningRoomList', 'kitchenList', 'bathroomList', 'miscellaneousList', 'cbList', 'last_eq_id'));
            }
            if ($enquiry_type == "Vehicle") {
                $twoWheelerList = DB::table('mst_tbl_vehicle_company')->select('*')->where("vehicle_type", "two wheeler")->get();
                $fourWheelerList = DB::table('mst_tbl_vehicle_company')->select('*')->where("vehicle_type", "four wheeler")->get();
                return view('shifting.shift_vehicale_artList', compact('last_eq_id', 'twoWheelerList', 'fourWheelerList'));
            }

        }
        // }
    }
    
    public function addArticalsList(Request $request){
        $input = $request->all();
        $homeType=$request->input('homeType');
        $last_eq_id=$request->input('last_eq_id');
        $articalesCount=$request->input('articalesCount');
        $slt_arti_id=$request->input('slt_arti_id');
        $slt_arti_count=$request->input('slt_arti_count');
        $submitBtn = $request->input('submit');
        $total_cft=0;
        $exp_vehical=0;
        $kilometer=$request->input('total_kilometer');
        $kilometer_id=0;
        $labour_charges= 0;
        $transport_charges= 0;
        $packing_charges= 0;
        $total_amt= 0;
        for($i=0;$i<$articalesCount;$i++){
            $data=array(
                "artical_id"=>$slt_arti_id[$i],
                "artical_count"=>$slt_arti_count[$i],
                "enq_id"=>$last_eq_id
                );
            EnquiryArticalsList::create($data);
            $rs_cft_amt= DB::table('mst_tbl_additional_cft')->select('*')->get(); // get all data ctf range and amount form mst_tbl_cft_base_amount
            
            $rs_cft = DB::table('mst_tbl_home_equipment')->select('eq_cft')->where("home_eq_id",$slt_arti_id[$i])->get();
            foreach($rs_cft as $data_cft){
                $eq_cft= $data_cft->eq_cft;
            }
            $total_eq_cft= $eq_cft*$slt_arti_count[$i]; // calculate cft depend upon the no of articals 
            $total_cft= $total_cft+$total_eq_cft;// calculate total cft 

//            $total_eq_cft_amt= $tmep_cft_amt*$slt_arti_count[$i]; // calculate cft amount depend upon the no of articals
//            $exp_shiping_amt = $exp_shiping_amt + $total_eq_cft_amt; //calculate total shipping amount
            
            
        }

//        $source = $this->getSourceName($last_eq_id);
//        $destination = $this->getDestinationName($last_eq_id);
//        $kilometer = $this->getKilometer($source,$destination);
//        if(empty($kilometer) || $kilometer==0){
//            $kilometer=1;
//        }

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
            "last_eq_id"=>$last_eq_id,
            "kilometer"=>$kilometer,
            "exp_vehical"=>$exp_vehical,
            "exp_no_of_lab_req"=>$exp_no_of_lab_req,
            "labour_charges"=>$labour_charges,
            "transport_charges"=>$transport_charges,
            "packing_charges"=>$packing_charges,
            "total_amt"=>$total_amt,
            "goods_value"=>$request->input('goods_value')
            );
//        print_r($shiping_data); die;

         EnqShiftingDetails::create($shiping_data);

        if($submitBtn=="articalsDashboardForm"){
            $addFormFlag="from add Home/Office";
            $addDetailsRS = DB::table("tbl_enquiry_customer_details")->where("enq_id",$last_eq_id)->get();
            foreach ($addDetailsRS as $addDetails){}
            return view('surveyPlan.import_home_contact_deatils',compact('last_eq_id','addFormFlag','addDetails'));
        }else{
            $addFormFlag="from add Home/Office";
            return view('shifting.shifit_home_contact_deatils',compact('last_eq_id','addFormFlag'));
        }

    }    
    
    public function addContactDetails(Request $request){
        $input = $request->all();
        // echo "<pre>";
        // print_r($input);die();
//        $validator = $request->validate( [
//            'cust_name' => 'required',
//            'cust_contact' => 'required',
//            'cust_email' => 'required',
//        ],[
//			'cust_name.required' => 'This field is required.',
//			'cust_contact.required' => 'This field is required.',
//			'cust_email.required' => 'This field is required.',
//		]);
        $sourceType=$request->input('sourceType');
        $sourceFloorNo=$request->input('sourceFloorNo');
        $packingService=$request->input('packingService');
        $loadingService=$request->input('loadingService');
        $sourceElevator=$request->input('sourceElevator');
        $destinationType=$request->input('destinationType');
        $destinationFloorNo=$request->input('destinationFloorNo');
        $unPackingService=$request->input('unPackingService');
        $unLoadingService=$request->input('unLoadingService');
        $destinationElevator=$request->input('destinationElevator');

        $cust_source_address1=$request->input('cust_source_address1');
        $cust_dest_address1=$request->input('cust_dest_address1');
        $last_eq_id=$request->input('last_eq_id');
        $submitBtn = $request->input('submit');

//        if($sourceType=="Apartment") {
//            $validator = $request->validate( [
//                'sourceFloorNo' => 'required',
//                'cust_source_address1' => 'required',
//                'cust_dest_address1' => 'required',
//            ],[
//                'sourceFloorNo.required' => 'Source Floor No is required.',
//                'cust_source_address1.required' => 'Source Address is required.',
//                'cust_dest_address1.required' => 'Destination Address is required.',
//            ]);
//        }else {
//            $validator = $request->validate( [
//                'cust_source_address1' => 'required',
//                'cust_dest_address1' => 'required',
//            ],[
//                'cust_source_address1.required' => 'Source Address is required.',
//                'cust_dest_address1.required' => 'Destination Address is required.',
//            ]);
//        }
//        if($destinationFloorNo=="Apartment") {
//            $validator = $request->validate( [
//                'destinationFloorNo' => 'required',
//                'cust_source_address1' => 'required',
//                'cust_dest_address1' => 'required',
//            ],[
//                'destinationFloorNo.required' => 'Destination Floor No is required.',
//                'cust_source_address1.required' => 'Source Address is required.',
//                'cust_dest_address1.required' => 'Destination Address is required.',
//            ]);
//        }else {
//            $validator = $request->validate( [
//                'cust_source_address1' => 'required',
//                'cust_dest_address1' => 'required',
//            ],[
//                'cust_source_address1.required' => 'Source Address is required.',
//                'cust_dest_address1.required' => 'Destination Address is required.',
//            ]);
//        }

		$data=array(
	        "enq_id"=>$last_eq_id,
            'src_prop_type'=>$sourceType,
            'src_floor_no'=>$sourceFloorNo,
            'src_packing_req'=>$packingService,
            'src_loading_req'=>$loadingService,
            'src_elavator'=>$sourceElevator,
            'dest_prop_type'=>$destinationType,
            'dest_floor_no'=>$destinationFloorNo,
            'dest_unpacking_req'=>$unPackingService,
            'dest_unloading_req'=>$unLoadingService,
            'dest_elavator'=>$destinationElevator,
            "src_add_line1"=>$cust_source_address1,
            "dest_add_line1"=>$cust_dest_address1
        );

        if($submitBtn=="contactDetailsDashboardForm"){

            $checkCn_noRS = DB::table("tbl_enquiry_customer_details")->where("enq_id",$last_eq_id)->get();
            $checkCount = $checkCn_noRS->count();
            if($checkCount >= 1 && !empty($checkCn_noRS)){
                ShiftingAddressDetails::where('enq_id', $last_eq_id)->update($data);
            }else {
                ShiftingAddressDetails::create($data);
            }

            $cn_no = $this->getCNNO($last_eq_id);
            $data= array('schedule_status'=>'Complete','updated_by' => Auth::user()->id);
            ScheduleSurveyModel::where('cn_no', $cn_no)->update($data);

            $smsIntrs = DB::table('tbl_sms_integration')->get();
            foreach($smsIntrs as $smsIntData){
                $sms_user_name=$smsIntData->user_name;
                $sms_password= $smsIntData->password;
                $sms_sender_id=$smsIntData->sender_id;

            }

            $userID = $this->getEnquiryUserId($cn_no);

            $usersrs = DB::table('users')->where('id',$userID)->get();
            foreach($usersrs as $usersData){
                $user_contact=$usersData->phone;
                $user_email= $usersData->email;
                $user_name= $usersData->first_name." ".$usersData->last_name;
            }
            //send SMS to To enquiry creator
            $smsBodyrs = DB::table('tbl_sms_template')->select("sms_body")->where("sms_for",'Survey Complete to creator')->get();
            $co_no= $this->getCNNO($last_eq_id);
            foreach($smsBodyrs as $smsdate){
                $smsbody=$smsdate->sms_body;
                eval("\$smsbody = \"$smsbody\";");
            }
//            $smsBody = "Dear Sir/Madam, Survey complete for CN No- ".$cn_no;
            $this->sendsms($user_contact, $sms_user_name,$sms_password,$sms_sender_id,$smsbody);

            // send Email to enquiry creator
            $emailBodyrs = DB::table('tbl_email_tempaltes')->select("email_body")->where("email_for",'survey complete to creator')->get();
            $cnno = $cn_no;
            foreach($emailBodyrs as $emaildate){
                $emailbody=$emaildate->email_body;
                eval("\$emailbody = \"$emailbody\";");
            }
            $data = array("body" => $emailbody);

            Mail::send(['html'=>'mail'], $data, function($message) use ($user_name, $user_email) {
                $message->to($user_email, $user_name)
                    ->subject('Survey Complete');
                $message->from('harshad@puretechnology.in','Safemove');
            });

            return redirect('/surveySchedule')->with('SuccessEnq', 'Thanks! For Enqyiry.');
        }else{
            ShiftingAddressDetails::create($data);
            return redirect('/')->with('SuccessEnq', 'Thanks! For Enqyiry.');
        }

    }

    
    // shifting vehicale functions
    public function shiftVehicle(){
        return view('shifting.shift_vehicle');
    }
    
    public function addOriDestVec(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'shiftingDate' => 'required',
            'shiftingSource' => 'required',
            'shiftingDestination' => 'required',
        ],[
			'shiftingDate.required' => 'This field is required.',
			'shiftingSource.required' => 'This field is required.',
			'shiftingDestination.required' => 'This field is required.',
		]);
        $shiftingDate = $request->input('shiftingDate');
        $shiftingSource = $request->input('shiftingSource');
        $shiftingDestination = $request->input('shiftingDestination');
        $data=array(
            "exp_shifiting_date"=>date("Y-m-d",strtotime($shiftingDate)),
            "source"=>$shiftingSource,
            "destination"=>$shiftingDestination,
            "enquiry_type"=>"vehicale"
            );
        DB::table('tbl_enquiry_ori_dest')->insert($data);
        $last_eq_id = DB::getPdo()->lastInsertId();
        $twoWheelerList = DB::table('mst_tbl_vehicle_company')->select('*')->where("vehicle_type","two wheeler")->get();
        $fourWheelerList = DB::table('mst_tbl_vehicle_company')->select('*')->where("vehicle_type","four wheeler")->get();
        return view('shifting.shift_vehicale_artList',compact('last_eq_id','twoWheelerList','fourWheelerList'));
    }
    
    public function addArticalsListVec(Request $request){
        $input = $request->all();
        $last_eq_id=$request->input('last_eq_id');
        $articalesCount=$request->input('articalesCount');
        $veh_type=$request->input('veh_type');
        $veh_segment=$request->input('veh_segment');
        $veh_name=$request->input('veh_name');
        
        for($i=0;$i<$articalesCount;$i++){
            $data=array(
                "vehicle_type"=>$veh_type[$i],
                "vehicle_segment"=>$veh_segment[$i],
                "vehicle_name"=>$veh_name[$i],
                "enq_id"=>$last_eq_id
            );
            EnquiryArticalsList::create($data);
        }
        $addFormFlag="from add vehicle";
        return view('shifting.shifit_home_contact_deatils',compact('last_eq_id','addFormFlag'));
    }
    
    // shifting office functions
    public function shiftOffice(){
        return view('shifting.shift_office');
    }

    public function getSourceName($last_eq_id){
        $result = DB::table('tbl_enquiry')->where("enq_id",$last_eq_id)->get();
        foreach ($result as $enq){
            $sourec = $enq->source;
        }
        return $sourec;
    }

    public function getDestinationName($last_eq_id){
        $result = DB::table('tbl_enquiry')->where("enq_id",$last_eq_id)->get();
        foreach ($result as $enq){
            $dest = $enq->destination;
        }
        return $dest;
    }

    public function getKilometer($source,$destination){
        // Get source latitude and longitude
        $resultSrc = DB::table('mst_tbl_city_lag_alt')->where("city",ucfirst($source))->get();
        foreach ($resultSrc as $dataSrc){
            $latitudeSrc = explode(" ",$dataSrc->latitude);
            $longitudeSrc = explode(" ",$dataSrc->longitude);
        }

        // Get Destination latitude and longitude
        $resultDest = DB::table('mst_tbl_city_lag_alt')->where("city",ucfirst($destination))->get();
        foreach ($resultDest as $dataDest){
            $latitudeDest = explode(" ",$dataDest->latitude);
            $longitudeDest = explode(" ",$dataDest->longitude);
        }

        $latitudeFrom = $latitudeSrc[0];
        $longitudeFrom = $longitudeSrc[0];

        $latitudeTo = $latitudeDest[0];
        $longitudeTo = $longitudeDest[0];

        $theta = $longitudeFrom-$longitudeTo;
        $dist = sin(deg2rad($latitudeFrom))*sin(deg2rad($latitudeTo))+cos(deg2rad($latitudeFrom))*cos(deg2rad($latitudeTo))*cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist*60*1.1515;

        return round($miles*1.609344,2);

    }
}
?>