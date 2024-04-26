<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Artisan;
use App\User;
use App\Setting;
use App\EmailTempalte;
use App\SMSTemplateModel;
use App\SmsIntegrationModel;
use App\EmailIntegrationModel;
use App\LeadSourceModel;
use App\LeadStatusModel;
use App\GoodsTypeModel;
use App\ArticalModel;
use App\PackingMaterialModel;
use App\TransportAgentModel;
use App\AdditionalCftModel;
use App\KilometerWiseChargesModel;
use App\OffExpCatogryModel;
use App\CompanyDetailsModel;
use App\VehicleModel;
use App\InvoiceSettingModel;
use App\BackupDatabase;
use DB;
use Auth;
use Session;
use App\Foo;
use View;



class SettingController extends Controller
{

    /**
     * Display a listing of the __construct.
     *
     * @return \Illuminate\Http\Response
     */
    protected $foo;
    public function __construct(Foo $foo)
    {
        $this->middleware('auth');
        $this->foo = $foo;
        $this->middleware('permission:settings.general');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $settingdata = DB::table('settings')->get();
        return view('setting.general_setting',compact('settingdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function sidebar()
    {
        $time = time();
//        $sidebaractivity = DB::table('user_activity')
//            ->leftJoin('users', 'users.id', '=', 'user_activity.user_id')
//            ->orderBy('user_activity.id','DES')->limit(5)->get();
//
//        $sidebarusers = DB::table('users')->orderBy('id','DES')->limit(5)->get();

//        $sidebarsettings = DB::table('settings')->first();

        $followupList = DB::table('tbl_enquiry')
            ->select('*')
            ->whereBetween('follow_up_date', [date("Y-m-d"), date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time) +2 ,date("Y", $time)))])
            ->where('isdelete',0)
            ->get();

        $surveyList = DB::table('tbl_schedule_survey')
            ->select('tbl_schedule_survey.*','tbl_enquiry.cust_name','tbl_enquiry.cust_contact')
            ->join('tbl_enquiry','tbl_enquiry.cn_no','=','tbl_schedule_survey.cn_no')
            ->whereBetween('tbl_schedule_survey.schedule_date', [date("Y-m-d"), date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time) +2 ,date("Y", $time)))])
            ->where('tbl_schedule_survey.isdelete',0)
            ->get();

        $shiftingList = DB::table('tbl_confirm_job')
            ->select('tbl_confirm_job.*','tbl_enquiry.cust_name','tbl_enquiry.cust_contact')
            ->join('tbl_enquiry','tbl_enquiry.cn_no','=','tbl_confirm_job.cn_no')
            ->whereBetween('tbl_confirm_job.moving_date', [date("Y-m-d"), date("Y-m-d", mktime(0,0,0,date("n", $time),date("j",$time) +2 ,date("Y", $time)))])
            ->where('tbl_confirm_job.isdelete',0)
            ->get();
        return view('setting.sidebar',compact('surveyList','shiftingList','followupList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $settingid = $request->input('settingid');
        $countdata = DB::table('settings')->groupBy('id')->count();
        if(!empty($input)){
            if($countdata<1){
                Setting::create($input);
                return Redirect::back()->with('msg_success', trans('app.insert_success_message'));
            }else{
                $data = Setting::findOrFail($settingid);
                $data->update($input);
                return Redirect::back()->with('msg_update', trans('app.update_success_message'));
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $id)
    {
        $input = $request->all();
        $rules = array('logo' => 'required | mimes:jpeg,jpg,png,gif | max:5120');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->with('msg_delete', "Please choose file jpeg,jpg,png,gif & maximum size 5mb !");
        }
        $logo = $request->file('logo');
        if(!empty($logo)){
            $filename  = time() . '.' . $logo->getClientOriginalExtension();
            $request->file('logo')->move('./uploads/', $filename );
            $data = Setting::findOrFail($id);
            $data->logo = $filename;
            $data->save();
            /*for user activity */
            $description = array('description'=>'User Updated.');
            $this->foo->users_activity($description);
            return Redirect::back()->with('msg_success', "Image Upload success!");
        }
        return Redirect::back()->with('msg_delete', "Image Upload Failed!");

    }

    public function companyDetailsPage(){

        $compRs = DB::table('tbl_company_Details')->get();
        foreach($compRs as $company){}
        return view('setting.companyDetailsPageView',compact('company'));
    }

    public function updateCompanyDetails(Request $request){
        $input = $request->all();
        $data=array(
            "name"=>$request->input('company_name'),
            "legal_name"=>$request->input('company_legal_name'),
            "contact_person"=>$request->input('contact_person'),
            "contact_email"=>$request->input('contact_email'),
            "contact"=>$request->input('contact_no'),
            "alt_contact"=>$request->input('alternate_no'),
            "add_line1"=>$request->input('address_line1'),
            "add_line2"=>$request->input('address_line2'),
            "city"=>$request->input('company_city'),
            "pincode"=>$request->input('company_pincode'),
            "state"=>$request->input('company_state'),
            "country"=>$request->input('company_country'),
            "website"=>$request->input('company_website'),
            "gst_no"=>$request->input('company_gst_no'),
            "updated_by"=> Auth::user()->id
        );

        if(CompanyDetailsModel::where('id',$request->input('company_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Not Updated Successfully.';
        }

        $compRs = DB::table('tbl_company_Details')->get();
        foreach($compRs as $company){}
        return view('setting.companyDetailsPageView',compact('company','message'));
    }

    public function ipSettingsPage(){
        return view('setting.ipSettingsPageView');
    }

    public function smsTemplatePage(){
        $tempaletData = DB::table("tbl_sms_template")->get();
        return view('setting.smsTemplatePageView',compact('tempaletData'));
    }

    //Add SMS template
    public function addSMSTemplate(Request $request){
        $input = $request->all();
        $data=array(
            "sms_for"=>$request->input('sms_for'),
            "sms_body"=>$request->input('sms_body'),
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );
        if(SMSTemplateModel::create($data)){
            $message = 'Record Inserted Successfully.';
        }else{
            $message = 'Record Inserted Not Successfully.';
        }

        $tempaletData = DB::table("tbl_sms_template")->get();
        return view('setting.smsTemplatePageView',compact('tempaletData','message'));

    }

    //Edit SMS template
    public function editSMSTemplate($id){
        $tempaletData = DB::table("tbl_sms_template")->where('id',base64_decode($id))->get();
        foreach ($tempaletData as $tempalet){}
        return view('setting.editSMSTemplateView',compact('tempalet'));
    }

    // Update SMS template
    public function updateSMSTemplate(Request $request){
        $input = $request->all();
        $data=array(
            "sms_body"=>$request->input('sms_body'),
            "updated_by"=> Auth::user()->id
        );
        if(SMSTemplateModel::where('id', $request->input('etid'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }

        $tempaletData = DB::table("tbl_sms_template")->get();
        return view('setting.smsTemplatePageView',compact('tempaletData','message'));
    }

    //email Tempalte Page
    public function emailTemplatePage(){
        $tempaletData = DB::table("tbl_email_tempaltes")->get();
        return view('setting.emailTemplatePageView',compact('tempaletData'));
    }

    //Add email template
    public function addEmailTemplate(Request $request){
        $input = $request->all();
        $data=array(
            "email_for"=>$request->input('email_for'),
            "email_body"=>$request->input('email_body'),
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );
        if(EmailTempalte::create($data)){
            $message = 'Record Inserted Successfully.';
        }else{
            $message = 'Record Inserted Not Successfully.';
        }

        $tempaletData = DB::table("tbl_email_tempaltes")->get();
        return view('setting.emailTemplatePageView',compact('tempaletData','message'));

    }

    //Edit email template
    public function editEmailTemplate($id){
        $tempaletData = DB::table("tbl_email_tempaltes")->where('id',base64_decode($id))->get();
        foreach ($tempaletData as $tempalet){}
        return view('setting.editEmailTemplateView',compact('tempalet'));
    }

    // Update email template
    public function updateEmailTemplate(Request $request){
        $input = $request->all();
        $data=array(
            "email_body"=>$request->input('email_body'),
            "updated_by"=> Auth::user()->id
        );
        if(EmailTempalte::where('id', $request->input('etid'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $tempaletData = DB::table("tbl_email_tempaltes")->get();
        return view('setting.emailTemplatePageView',compact('tempaletData','message'));
    }

    public function invoiceSettingPage(){
        $invData = DB::table("tbl_invoice_setting")->get();
        foreach ($invData as $invoice){}
        return view('setting.invoiceSettingPageView',compact('invoice'));
    }

    // Update email template
    public function updateInvoiceSetting(Request $request){
        $input = $request->all();
        $data=array(
            "invoice_prefix"=>$request->input('invoice_prefix'),
            "quot_prefix"=>$request->input('quotation_prefix'),
            "service_tax_no"=>$request->input('service_tax_no'),
            "pan_no"=>$request->input('pan_no'),
            "invoice_currency"=>$request->input('invoice_currency'),
            "payment_currency"=>$request->input('payment_currency'),
            "updated_by"=> Auth::user()->id
        );
        if(InvoiceSettingModel::where('id', $request->input('inv_set_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $invData = DB::table("tbl_invoice_setting")->get();
        foreach ($invData as $invoice){}
        return view('setting.invoiceSettingPageView',compact('invoice','message'));
    }

    public function quotationSettingPage(){
        return view('setting.quotationSettingPageView');
    }

    public function incomeCategaoryPage(){
        return view('setting.incomeCategaoryPageView');
    }

    public function expensesCategaoryPage(){
        return view('setting.expensesCategaoryPageView');
    }

    public function leadStatusPage(){
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('setting.leadStatusPageView',compact('statusRS'));
    }

// Add Lead Status
    public function adddLeadStatus(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'leads_status' => 'required',
            'leads_type' => 'required',
        ],[
            'leads_status.required' => 'Lead status is required.',
            'leads_type.required' => 'Lead type is required.',
        ]);
        $data=array(
            "lead_status"=>$request->input('leads_status'),
            "lead_type"=>$request->input('leads_type'),
            "orderno"=>$request->input('order_no'),
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );
        if(LeadStatusModel::create($data)){
            $message = 'Record inserted Successfully.';
        }else{
            $message = 'Record Not inserted Successfully.';
        }
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('setting.leadStatusPageView',compact('statusRS','message'));
    }

    // ajax call for get lead Status data
    public function getLeadStatusData(){
        $status_id =$_GET['status_id'];
        $i=0;
        $statusRS = DB::table('tbl_lead_status')
            ->where("id", $status_id)
            ->get();
        foreach ($statusRS as $statusData) {}
        echo json_encode($statusData);
    }
    // Add Lead Status
    public function updatedLeadStatus(Request $request){
        $input = $request->all();
//        $validator = $request->validate( [
//            'leads_status' => 'required',
//            'leads_type' => 'required',
//        ],[
//            'leads_status.required' => 'Lead status is required.',
//            'leads_type.required' => 'Lead type is required.',
//        ]);
        $data=array(
            "lead_status"=>$request->input('edit_leads_status'),
            "lead_type"=>$request->input('edit_leads_type'),
            "orderno"=>$request->input('edit_order_no'),
            "updated_by"=> Auth::user()->id
        );
        if(LeadStatusModel::where('id',$request->input('edit_status_id') )->update($data)){
            $message = 'Record updated Successfully.';
        }else{
            $message = 'Record Not updated Successfully.';
        }
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('setting.leadStatusPageView',compact('statusRS','message'));
    }

    // Delete Lead Status
    public function leadStatusDestroy($id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);
        if(LeadStatusModel::where('id', base64_decode($id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        $statusRS = DB::table("tbl_lead_status")->get();
        return view('setting.leadStatusPageView',compact('statusRS','message'));
    }

    public function leadSourcePage(){
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        return view('setting.leadSourcePageView',compact('sourceRS'));
    }
    // Add Lead Status
    public function adddLeadSource(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'leads_source' => 'required',
        ],[
            'leads_source.required' => 'Lead status is required.',
        ]);
        $data=array(
            "lead_source"=>$request->input('leads_source'),
            "isdelete"=>0,
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );
        if(LeadSourceModel::create($data)){
            $message = 'Record inserted Successfully.';
        }else{
            $message = 'Record Not inserted Successfully.';
        }
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        return view('setting.leadSourcePageView',compact('sourceRS','message'));
    }

    // ajax call for get lead Status data
    public function getLeadSourceData(){
        $source_id =$_GET['source_id'];
        $sourceRS = DB::table('tbl_lead_source')
            ->where("id", $source_id)
            ->get();
        foreach ($sourceRS as $sourceData) {}
        echo json_encode($sourceData);
    }
    // Update Lead Status
    public function updatedLeadSource(Request $request){
        $input = $request->all();
//        $validator = $request->validate( [
//            'leads_source' => 'required',
//        ],[
//            'leads_source.required' => 'Lead status is required.',
//        ]);
        $data=array(
            "lead_source"=>$request->input('edit_leads_source'),
            "updated_by"=> Auth::user()->id
        );
        if(LeadSourceModel::where('id',$request->input('edit_source_id') )->update($data)){
            $message = 'Record updated Successfully.';
        }else{
            $message = 'Record Not updated Successfully.';
        }
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        return view('setting.leadSourcePageView',compact('sourceRS','message'));
    }

    // Delete Lead Source
    public function leadSourceDestroy($id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);
        if(LeadSourceModel::where('id', base64_decode($id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        $sourceRS = DB::table("tbl_lead_source")->where('isdelete',0)->get();
        return view('setting.leadSourcePageView',compact('sourceRS','message'));
    }

    public function cronJobPage(){
        return view('setting.cronJobPageView');
    }

    public function systemUpadtePage(){
        return view('setting.systemUpadtePageView');
    }

    // Goods type function
    public function goodsTypePage(){
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        return view('setting.goodsTypePageView',compact('goodsRS'));
    }

    // Add Goods Type
    public function adddGoodsType(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'goods_type' => 'required',
        ],[
            'goods_type.required' => 'Goods type is required.',
        ]);
        $data=array(
            "goods_type"=>$request->input('goods_type'),
            "isdelete"=>0,
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );
        if(GoodsTypeModel::create($data)){
            $message = 'Record inserted Successfully.';
        }else{
            $message = 'Record Not inserted Successfully.';
        }
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        return view('setting.goodsTypePageView',compact('goodsRS','message'));
    }

    // ajax call for get Goods type data
    public function getGoodsTypeData(){
        $goods_id =$_GET['goods_id'];
        $sourceRS = DB::table('tbl_goods_type')
            ->where("id", $goods_id)
            ->get();
        foreach ($sourceRS as $sourceData) {}
        echo json_encode($sourceData);
    }
    // Update Goods type
    public function updateGoodsType(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'edit_goods_type' => 'required',
        ],[
            'edit_goods_type.required' => 'Goods type is required.',
        ]);
        $data=array(
            "goods_type"=>$request->input('edit_goods_type'),
            "updated_by"=> Auth::user()->id
        );
        if(GoodsTypeModel::where('id',$request->input('edit_goods_id') )->update($data)){
            $message = 'Record updated Successfully.';
        }else{
            $message = 'Record Not updated Successfully.';
        }
        $goodsRS = DB::table("tbl_goods_type")->where('isdelete',0)->get();
        return view('setting.goodsTypePageView',compact('goodsRS','message'));
    }

    public function vehiclePage(){
        $vehicleRS = DB::table("mst_tbl_vehical_details")->get();
        return view('setting.vehiclePageView',compact('vehicleRS'));
    }

    // Add Goods Type
    public function addVehicle(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'vehicle_name' => 'required',
            'no_of_labour' => 'required',
            'cft_start_range' => 'required',
            'cft_end_range' => 'required',
        ],[
            'vehicle_name.required' => 'Vehicle Name is required.',
            'no_of_labour.required' => 'No of labour is required.',
            'cft_start_range.required' => 'CFT start range is required.',
            'cft_end_range.required' => 'CFT end range is required.',
        ]);
        $data=array(
            "vehical_name"=>$request->input('vehicle_name'),
            "labour_required"=>$request->input('no_of_labour'),
            "cft_start_range"=>$request->input('cft_start_range'),
            "cft_end_range"=>$request->input('cft_end_range'),
            "vehical_dimension"=>$request->input('vehical_dimension')
        );
        if(VehicleModel::create($data)){
            $message = 'Record inserted Successfully.';
        }else{
            $message = 'Record Not inserted Successfully.';
        }
        $vehicleRS = DB::table("mst_tbl_vehical_details")->get();
        return view('setting.vehiclePageView',compact('vehicleRS','message'));
    }

    // ajax call for get Goods type data
    public function getVehicleData(){
        $veh_id =$_GET['veh_id'];
        $vehicleRS = DB::table('mst_tbl_vehical_details')
            ->where("vehical_id", $veh_id)
            ->get();
        foreach ($vehicleRS as $vehicle) {}
        echo json_encode($vehicle);
    }
    // Update Goods type
    public function updateVehicle(Request $request){
        $input = $request->all();
//        $validator = $request->validate( [
//            'edit_goods_type' => 'required',
//        ],[
//            'edit_goods_type.required' => 'Goods type is required.',
//        ]);
        $data=array(
            "vehical_name"=>$request->input('edit_vehicle_name'),
            "labour_required"=>$request->input('edit_no_of_labour'),
            "cft_start_range"=>$request->input('edit_cft_start_range'),
            "cft_end_range"=>$request->input('edit_cft_end_range'),
            "vehical_dimension"=>$request->input('edit_vehical_dimension')
        );
        if(VehicleModel::where('vehical_id',$request->input('edit_veh_id') )->update($data)){
            $message = 'Record updated Successfully.';
        }else{
            $message = 'Record Not updated Successfully.';
        }
        $vehicleRS = DB::table("mst_tbl_vehical_details")->get();
        return view('setting.vehiclePageView',compact('vehicleRS','message'));
    }
//Articals Page vire
    public function articalPage(){
        $articalsRS = DB::table("mst_tbl_home_equipment")->where('isdelete',0)->get();
        return view('setting.articalPageView',compact('articalsRS'));
    }

    // Add Goods Type
    public function addArticals(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'name' => 'required',
            'lenght' => 'required',
            'width' => 'required',
            'height' => 'required',
            'artical_types' => 'required',
        ],[
            'name.required' => 'Name is required.',
            'lenght.required' => 'Lenght is required.',
            'width.required' => 'Width is required.',
            'height.required' => 'Height is required.',
            'artical_types.required' => 'Artical Type is required.',
        ]);
        $data=array(
            "eq_name"=>$request->input('name'),
            "eq_lenght"=>$request->input('lenght'),
            "eq_width"=>$request->input('width'),
            "eq_height"=>$request->input('height'),
            "eq_sq_feet"=>$request->input('lenght')*$request->input('width')*$request->input('height'),
            "eq_cft"=>$request->input('lenght')*$request->input('width')*$request->input('height'),
            "eq_type"=>$request->input('artical_types'),
            "isdelete"=>0,
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );
        if(ArticalModel::create($data)){
            $message = 'Record inserted Successfully.';
        }else{
            $message = 'Record Not inserted Successfully.';
        }
        $articalsRS = DB::table("mst_tbl_home_equipment")->where('isdelete',0)->get();
        return view('setting.articalPageView',compact('articalsRS','message'));
    }

    public function backupDatabasePage(){
//        exec('php artisan mysql:backup');
        $backupRS = DB::table("mst_tbl_backup_database")->where('isdelete',0)->get();
        return view('setting.backupDatabasePageView',compact('backupRS'));
    }

    public function takeDatabaseBackup(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'password' => 'required',
        ],[
            'password.required' => 'Password is required.',
        ]);
        $user_id = $request->input('user_id');
        $password = $request->input('password');

        $checkAdmin = DB::table("role_user")
            ->where('user_id',$user_id)
            ->where('role_id','1')
            ->get();
        $count = $checkAdmin->count();
        if($count >=1){
            if (Auth::attempt(array('id' => $user_id, 'password' => $password))){
                exec('php artisan mysql:backup');
                $message = "Backup Succesfully done";
            }
            else {
                $message = "Wrong Credentials";
            }
        }else{
            $message = "Only Admin can take backup of database";
        }
        $backupRS = DB::table("mst_tbl_backup_database")->where('isdelete',0)->get();
        return view('setting.backupDatabasePageView',compact('backupRS','message'));
    }

    public function backupDestroy($id){
        $data= array('isdelete'=>1);
        if(BackupDatabase::where('id', base64_decode($id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        $backupRS = DB::table("mst_tbl_backup_database")->where('isdelete',0)->get();
        return view('setting.backupDatabasePageView',compact('backupRS','message'));
    }

    public function emailSMSIntegration(){
        $EmailRS = DB::table("tbl_email_integration")->get();
        foreach ($EmailRS as $EmailData){}
        $smsRS = DB::table("tbl_sms_integration")->get();
        foreach ($smsRS as $SmsData){}
        return view('setting.emailSMSIntegrationView',compact('EmailData','SmsData'));
    }
// Update email credentials
    public function updateEmailCredentials(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'host_name' => 'required',
            'port_no' => 'required',
            'user_name' => 'required',
            'password' => 'required',
            'encryption' => 'required',
        ],[
            'host_name.required' => 'Host Name is required.',
            'port_no.required' => 'Posrt No is required.',
            'user_name.required' => 'User Name is required.',
            'password.required' => 'Password is required.',
            'encryption.required' => 'Encryption is required.',
        ]);
        $data=array(
            "host_name"=>$request->input('host_name'),
            "port_no"=>$request->input('port_no'),
            "user_name"=>$request->input('user_name'),
            "password"=>$request->input('password'),
            "encryption"=>$request->input('encryption'),
            "updated_by"=> Auth::user()->id
        );
        if(EmailIntegrationModel::where('id', 1)->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $EmailRS = DB::table("tbl_email_integration")->get();
        foreach ($EmailRS as $EmailData){}
        $smsRS = DB::table("tbl_sms_integration")->get();
        foreach ($smsRS as $SmsData){}
        return view('setting.emailSMSIntegrationView',compact('EmailData','SmsData','message'));
    }
// Update sms credentials
    public function updateSMSCredentials(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'sms_user_name' => 'required',
            'sms_password' => 'required',
            'sender_id' => 'required',
        ],[
            'sender_id.required' => 'Sender Id is required.',
            'sms_user_name.required' => 'User Name is required.',
            'sms_password.required' => 'Password is required.',
        ]);
        $data=array(
            "sender_id"=>strtoupper($request->input('sender_id')),
            "user_name"=>$request->input('sms_user_name'),
            "password"=>$request->input('sms_password'),
            "updated_by"=> Auth::user()->id
        );
        if(SmsIntegrationModel::where('id', 1)->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $EmailRS = DB::table("tbl_email_integration")->get();
        foreach ($EmailRS as $EmailData){}
        $smsRS = DB::table("tbl_sms_integration")->get();
        foreach ($smsRS as $SmsData){}
        return view('setting.emailSMSIntegrationView',compact('EmailData','SmsData','message'));
    }

    // packing material list
    public function packingMaterialPage(){
        $packing_list= DB::table('tbl_packing_material')->select("*")->where("isdelete",0)->get();
        return view('setting.packingMaterialPageView',compact("packing_list"));
    }

    // ajax call for get Packing Material data
    public function getPackingMaterialData(){
        $id =$_GET['id'];
        $sourceRS = DB::table('tbl_packing_material')
            ->where("id", $id)
            ->get();
        foreach ($sourceRS as $sourceData) {}
        echo json_encode($sourceData);
    }

    // Update Packing material Details
    public function updatePackingMaterial(Request $request){
        $input = $request->all();
        $data=array(
            "rate"=>$request->input('edit_rate'),
            "updated_by"=> Auth::user()->id
        );
        if(PackingMaterialModel::where('id', $request->input('edit_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $packing_list= DB::table('tbl_packing_material')->select("*")->where("isdelete",0)->get();
        return view('setting.packingMaterialPageView',compact("packing_list",'message'));
    }

    // Delete Packing material Details
    public function packingMaterialDestroy($id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);
        if(PackingMaterialModel::where('id', base64_decode($id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        $packing_list= DB::table('tbl_packing_material')->select("*")->where("isdelete",0)->get();
        return view('setting.packingMaterialPageView',compact("packing_list",'message'));
    }

    // Transport Agent Page view
    public function transportAgentPage(){
        $agent_list_rs= DB::table('tbl_transport_agent')->select("*")->where("isdelete",0)->get();
        return view('setting.transportAgentPageView',compact('agent_list_rs'));
    }

    // Add Transport Agent
    public function addTransportAgentName(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'agent_name' => 'required',
            'trans_name' => 'required',
            'contact_no' => 'required|digits:10|min:10|max:11',
            'contact_email' => 'required',
            'address' => 'required',
        ],[
            'agent_name.required' => 'Agent Name is required.',
            'trans_name.required' => 'Transport Name is required.',
            'contact_no.required' => 'Contact No is required.',
            'contact_no.min' => 'Contact No required minimum 10 Digit.',
            'contact_no.max' => 'Contact No required maximum 10 Digit.',
            'contact_email.required' => 'Contact Email is required.',
            'address.required' => 'Address is required.',
        ]);
        $data=array(
            "trans_agent_name"=>$request->input('agent_name'),
            "trans_name"=>$request->input('trans_name'),
            "contact_no"=>$request->input('contact_no'),
            "contact_no2"=>$request->input('contact_no2'),
            "contact_no3"=>$request->input('contact_no3'),
            "contact_email"=>$request->input('contact_email'),
            "address"=>$request->input('address'),
            "isdelete"=>0,
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );
        if(TransportAgentModel::create($data)){
            $message = 'Record inserted Successfully.';
        }else{
            $message = 'Record Not inserted Successfully.';
        }
        $agent_list_rs= DB::table('tbl_transport_agent')->select("*")->where("isdelete",0)->get();
        return view('setting.transportAgentPageView',compact('agent_list_rs','message'));
    }

    // ajax call for get transport agent data
    public function gettransAgentData(){
        $id =$_GET['tagnt_id'];
        $agent_list_rs = DB::table('tbl_transport_agent')
            ->where("id", $id)
            ->get();
        foreach ($agent_list_rs as $agent_list_data) {}
        echo json_encode($agent_list_data);
    }

    // Update transport agent Details
    public function updatetransportAgent(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'edit_agent_name' => 'required',
            'edit_contact_no' => 'required|digits:10|min:10|max:11',
            'edit_contact_email' => 'required',
            'edit_address' => 'required',
        ],[
            'edit_agent_name.required' => 'Agent Name is required.',
            'edit_contact_no.required' => 'Contact No is required.',
            'edit_contact_no.min' => 'Contact No required minimum 10 Digit.',
            'edit_contact_no.max' => 'Contact No required maximum 10 Digit.',
            'edit_contact_email.required' => 'Contact Email is required.',
            'edit_address.required' => 'Address is required.',
        ]);
        $data=array(
            "trans_agent_name"=>$request->input('edit_agent_name'),
            "contact_no"=>$request->input('edit_contact_no'),
            "contact_no2"=>$request->input('edit_contact_no2'),
            "contact_no3"=>$request->input('edit_contact_no3'),
            "contact_email"=>$request->input('edit_contact_email'),
            "address"=>$request->input('edit_address'),
            "updated_by"=> Auth::user()->id
        );
        if(TransportAgentModel::where('id', $request->input('tagnt_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $agent_list_rs= DB::table('tbl_transport_agent')->select("*")->where("isdelete",0)->get();
        return view('setting.transportAgentPageView',compact('agent_list_rs','message'));
    }

    // Delete Transport Agent
    public function transAgentDestroy($id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);
        if(TransportAgentModel::where('id', base64_decode($id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        $agent_list_rs= DB::table('tbl_transport_agent')->select("*")->where("isdelete",0)->get();
        return view('setting.transportAgentPageView',compact('agent_list_rs','message'));
    }

    // Additional CFT Page view
    public function additionalCFTPage(){
        $addCft= DB::table('mst_tbl_additional_cft')->select("*")->where("isdelete",0)->get();
        return view('setting.additionalCFTPageView',compact('addCft'));
    }

    // Add Additional CFT
    public function addAdditionalCFT(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'start_cft_range' => 'required',
            'end_cft_range' => 'required',
            'additional_cft' => 'required',
        ],[
            'start_cft_range.required' => 'Start Range is required.',
            'end_cft_range.required' => 'End Range is required.',
            'additional_cft.required' => 'Additional CFT is required.',
        ]);
        $data=array(
            "cft_start_range"=>$request->input('start_cft_range'),
            "cft_end_range"=>$request->input('end_cft_range'),
            "additional_cft"=>$request->input('additional_cft'),
            "isdelete"=>0,
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );
        if(AdditionalCftModel::create($data)){
            $message = 'Record inserted Successfully.';
        }else{
            $message = 'Record Not inserted Successfully.';
        }
        $addCft= DB::table('mst_tbl_additional_cft')->select("*")->where("isdelete",0)->get();
        return view('setting.additionalCFTPageView',compact('addCft','message'));
    }

    // ajax call for get Additional Cft data
    public function getAdditionalCFTData(){
        $id =$_GET['id'];
        $agent_list_rs = DB::table('mst_tbl_additional_cft')
            ->where("cft_id", $id)
            ->get();
        foreach ($agent_list_rs as $agent_list_data) {}
        echo json_encode($agent_list_data);
    }

    // Update Additional CFT Details
    public function updateAdditionalCFT(Request $request){
        $input = $request->all();
        $data=array(
            "additional_cft"=>$request->input('edit_additional_cft'),
            "updated_by"=> Auth::user()->id
        );
        if(AdditionalCftModel::where('cft_id', $request->input('cft_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $addCft= DB::table('mst_tbl_additional_cft')->select("*")->where("isdelete",0)->get();
        return view('setting.additionalCFTPageView',compact('addCft','message'));
    }

    // Kilometer wise charges view
    public function kilometerWiseAmountPage(){
        $kmCharges = DB::table('mst_tbl_km_wise_amt')->select("*")->where("isdelete",0)->get();
        $vehicalData = DB::table('mst_tbl_vehical_details')->select("*")->get();
        return view('setting.kilometerWiseChargesView',compact('kmCharges','vehicalData'));
    }

    // ajax call for get Charges data
    public function getChargesData(){
        $vehi_id =$_GET['vehi_id'];
        $chargesRs = DB::table('mst_tbl_km_wise_amt')
            ->select("mst_tbl_km_wise_amt.*",'mst_tbl_kilometer.*','mst_tbl_vehical_details.*')
            ->join("mst_tbl_kilometer","mst_tbl_kilometer.km_id","=","mst_tbl_km_wise_amt.km_id")
            ->join("mst_tbl_vehical_details","mst_tbl_vehical_details.vehical_id","=","mst_tbl_km_wise_amt.vehical_id")
            ->where("mst_tbl_km_wise_amt.vehical_id", $vehi_id)
            ->get();
        foreach ($chargesRs as $chargesData) {
            echo "<tr>";
            echo "<td>".$chargesData->km_start_range."-".$chargesData->km_end_range."</td>";
            echo "<td>".$chargesData->vehical_name."</td>";
            echo "<td>".$chargesData->labour_charges."</td>";
            echo "<td>".$chargesData->transport_charges."</td>";
            echo "<td>".$chargesData->packing_charges."</td>";
            echo "<td>".$chargesData->total_amt."</td>";
            echo '<td><a title="{{ trans(\'app.edit\')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans(\'app.edit\')}}" class="btn btn-icon btn-info btn-outline btn-round" onclick="kmWiseChargesEdit('.$chargesData->km_amt_id.')" ><i class="icon wb-pencil" aria-hidden="true"></i> </a></td>';
            echo "</tr>";
        }
    }

    // ajax call for get Charges data for perticular id
    public function getkmWiseChargesData(){
        $id =$_GET['id'];
        $chargesRs = DB::table('mst_tbl_km_wise_amt')
            ->select("mst_tbl_km_wise_amt.*",'mst_tbl_kilometer.*','mst_tbl_vehical_details.*')
            ->join("mst_tbl_kilometer","mst_tbl_kilometer.km_id","=","mst_tbl_km_wise_amt.km_id")
            ->join("mst_tbl_vehical_details","mst_tbl_vehical_details.vehical_id","=","mst_tbl_km_wise_amt.vehical_id")
            ->where("mst_tbl_km_wise_amt.km_amt_id", $id)
            ->get();
        foreach ($chargesRs as $chargesData) { }
        echo json_encode($chargesData);
    }

    // Update kilometer wise charges Details
    public function updateKmWiseCharges(Request $request){
        $input = $request->all();
        $data=array(
            "labour_charges"=>$request->input('edit_lab_charg'),
            "transport_charges"=>$request->input('edit_trans_charg'),
            "packing_charges"=>$request->input('edit_pack_charg'),
            "total_amt"=>$request->input('edit_lab_charg')+$request->input('edit_trans_charg')+$request->input('edit_pack_charg'),
            "updated_by"=> Auth::user()->id
        );
        $veh_id = $request->input('edit_veh_id');
        if(KilometerWiseChargesModel::where('km_amt_id', $request->input('km_amt_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $kmCharges = DB::table('mst_tbl_km_wise_amt')->select("*")->where("isdelete",0)->get();
        $vehicalData = DB::table('mst_tbl_vehical_details')->select("*")->get();
        return view('setting.kilometerWiseChargesView',compact('kmCharges','vehicalData','message','veh_id'));
    }

    // Office Expenses Catgory view
    public function offExpCategory(){
        $offExpRs = DB::table('tbl_off_exp_category')->select("*")->where("isdelete",0)->get();
        return view('setting.offExpCategoryView',compact('offExpRs'));
    }

    // Add office expenses CFT
    public function addOffExpCategory(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'category_name' => 'required',
        ],[
            'category_name.required' => 'Category name is required.',
        ]);
        $data=array(
            "category_name"=>$request->input('category_name'),
            "isdelete"=>0,
            "created_by"=> Auth::user()->id,
            "updated_by"=> Auth::user()->id
        );

        if(OffExpCatogryModel::create($data)){
            $message = 'Record inserted Successfully.';
        }else{
            $message = 'Record Not inserted Successfully.';
        }

        $offExpRs = DB::table('tbl_off_exp_category')->select("*")->where("isdelete",0)->get();
        return view('setting.offExpCategoryView',compact('offExpRs','message'));
    }

    // ajax call for get Charges data for perticular id
    public function getOffExpCategoryData(){
        $id =$_GET['cat_id'];
        $catRs = DB::table('tbl_off_exp_category')
            ->where("tbl_off_exp_category.id", $id)
            ->get();
        foreach ($catRs as $catData) { }
        echo json_encode($catData);
    }

    // Update expenses category Details
    public function updateOffExpCategory(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'edit_category_name' => 'required',
        ],[
            'edit_category_name.required' => 'Category name is required.',
        ]);
        $data=array(
            "category_name"=>$request->input('edit_category_name'),
            "updated_by"=> Auth::user()->id
        );
        if(OffExpCatogryModel::where('id', $request->input('edit_cat_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Updated Not Successfully.';
        }
        $offExpRs = DB::table('tbl_off_exp_category')->select("*")->where("isdelete",0)->get();
        return view('setting.offExpCategoryView',compact('offExpRs','message'));
    }

    // Delete Transport Agent
    public function categoryDestroy($id){
        $data= array('isdelete'=>1,'updated_by' => Auth::user()->id);
        if(OffExpCatogryModel::where('id', base64_decode($id))->update($data)){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Delete Successfully.';
        }
        $offExpRs = DB::table('tbl_off_exp_category')->select("*")->where("isdelete",0)->get();
        return view('setting.offExpCategoryView',compact('offExpRs','message'));
    }

    public  function deleteArtical($id){

        if(ArticalModel::where('home_eq_id',base64_decode($id))->update(array('isdelete'=>"1"))){
            $message = 'Record Deleted Successfully.';
        }else{
            $message = 'Record Not Deleted Successfully.';
        }
        $articalsRS = DB::table("mst_tbl_home_equipment")->where('isdelete',0)->get();
        return view('setting.articalPageView',compact('articalsRS','message'));
    }

    public function editArtical($id){
        $articalsRS = DB::table("mst_tbl_home_equipment")->where('home_eq_id',base64_decode($id))->first();
        return view('setting.editArticalPageView',compact('articalsRS'));
    }

    // Add Goods Type
    public function updateArticals(Request $request){
        $input = $request->all();
        $validator = $request->validate( [
            'name' => 'required',
            'lenght' => 'required',
            'width' => 'required',
            'height' => 'required',
            'artical_types' => 'required',
        ],[
            'name.required' => 'Name is required.',
            'lenght.required' => 'Lenght is required.',
            'width.required' => 'Width is required.',
            'height.required' => 'Height is required.',
            'artical_types.required' => 'Artical Type is required.',
        ]);
        $data=array(
            "eq_name"=>$request->input('name'),
            "eq_lenght"=>$request->input('lenght'),
            "eq_width"=>$request->input('width'),
            "eq_height"=>$request->input('height'),
            "eq_sq_feet"=>$request->input('lenght')*$request->input('width')*$request->input('height'),
            "eq_cft"=>$request->input('lenght')*$request->input('width')*$request->input('height'),
            "eq_type"=>$request->input('artical_types'),
            "isdelete"=>0,
            "updated_by"=> Auth::user()->id
        );
        if(ArticalModel::where('home_eq_id',$request->input('home_eq_id'))->update($data)){
            $message = 'Record Updated Successfully.';
        }else{
            $message = 'Record Not Updated Successfully.';
        }
        $articalsRS = DB::table("mst_tbl_home_equipment")->where('isdelete',0)->get();
        return view('setting.articalPageView',compact('articalsRS','message'));
    }
}
