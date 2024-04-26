 <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/* home controller */

 Route::get('/', 'DashboardController@index');
 Route::get('/home', 'HomeController@index');
 Route::get('/contactus', 'HomeController@contactus');
 Route::get('/quotation', 'HomeController@quotation');
 Route::get('/customerlogin', 'customerController@index');
 Route::get('/customerhome', 'customerController@customerDashboard');
 Route::get('/customerfaq', 'customerController@faq');
 Route::get('/reviews', 'customerController@reviews');
 Route::get('/customerservice', 'customerController@customerservice');
 Route::get('/customerlogout', 'customerController@customerlogout');
 Route::post('/customerlogin', 'customerController@customerlogin');
 Route::get('/reset_password', 'customerController@reset_password');
 Route::get('/createaccount', 'customerController@createaccount');
 Route::post('/createaccount', 'customerController@store');

 Route::get('/login', 'DashboardController@index');
 Route::get('/admin', 'DashboardController@index');
 Route::get('/logout', 'DashboardController@logout');

 Auth::routes();
 Route::get('/master', "master@index");
 Route::get('/registration', "UserController@registration");
 Route::get('/userlist', "UserController@index");
 Route::post('/store', "UserController@store");
 Route::get('/edit/{id}', "UserController@edit");
 Route::get('/show/{id}', "UserController@show");
 Route::post('/update/{id}', "UserController@update");
 Route::get('/destroy/{id}', "UserController@destroy");
 Route::post('/upload/{id}', "UserController@upload");
 Route::post('/authentication/{id}', "UserController@authentication");
 Route::post('/importcsv', "UserController@importcsv");
 Route::get('/import', "UserController@importuser");
 Route::get('/profile', "UserController@profile");
 Route::get('/profileEdit', "UserController@profileEdit");
 Route::get('/export', "UserController@xlsexport");
 Route::get('/pdf', "UserController@pdfexport");
 Route::get('/usersprint', "UserController@userlistprint");

/* Customer */
 Route::get('/customers', 'UserController@customers');
 Route::get('/customerdetails/{id}', 'UserController@customerdetails');
 Route::get('/customerpdf', "UserController@customerpdfexport");
 Route::get('/destroycustomer/{id}', "UserController@destroycustomer");

/* send email */

 Route::get('/sendemail', "UserController@sendemail");
 Route::post('/user/sendemail', "UserController@sendemail");

/* username and email exists ajax check */
 Route::post('/uniqueuser', "UserController@uniqueuser");
 Route::post('/uniqueemail', "UserController@uniqueemail");
 Route::post('/uniqueuser_edit', "UserController@uniqueuser_edit");
 Route::post('/uniqueemail_edit', "UserController@uniqueemail_edit");

/* Social Login facebook,google,twitter */
 Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
 Route::get('/callback/{provider}', 'SocialAuthController@callback');


// Route::get('home', array('as' => 'home', 'uses' => function(){
  // return view('home');
// }));


/* Language */
 Route::get('/language', "LanguageController@index");
 Route::post('LanguageController/store', ['as' => 'languages.store', 'uses' => 'LanguageController@store']);
 Route::get('LanguageController/edit/{id}', "LanguageController@edit");
 Route::post('LanguageController/update/{id}', "LanguageController@update");
 Route::get('LanguageController/chooser_language/{id}',"LanguageController@chooser_language" );
 Route::get('/LanguageController/destroy/{id}/{lan}', "LanguageController@destroy");

/* roles and Permission */
 Route::get('/roles', "RoleController@index");
 Route::get('/RoleController/edit/{id}', "RoleController@edit");
 Route::post('roles', ['as' => 'roles.store', 'uses' => 'RoleController@store']);
 Route::post('RoleController/update/{id}','RoleController@update');
 Route::get('/RoleController/destroy/{id}', "RoleController@destroy");

//Route::post('/roles', "RoleController@index");
 Route::get('/permissions', "PermissionController@index");
 Route::get('/PermissionController/edit/{id}', "PermissionController@edit");
 Route::post('permissions', ['as' => 'permission.store','uses' => 'PermissionController@store']);
 Route::post('PermissionController/update/{id}','PermissionController@update');
 Route::post('permissions/save', ['as' => 'permission.save', 'uses' => 'PermissionController@saveRolePermissions']);
 Route::get('/PermissionController/destroy/{id}', "PermissionController@destroy");

/* User Activity activity */ 
 Route::get('/activity/', "ActivityController@index");
 Route::get('/activity/user/{id}', "ActivityController@activity_user");

/* Setting */ 
 Route::get('/settings/', "SettingController@index");
 Route::post('/settings/', "SettingController@store");
 Route::get('/companyDetailsPage', "SettingController@companyDetailsPage");
 Route::post('/updateCompanyDetails', "SettingController@updateCompanyDetails");
 Route::get('/ipSettingsPage', "SettingController@ipSettingsPage");

 Route::get('/smsTemplatePage', "SettingController@smsTemplatePage");
 Route::post('/addSMSTemplate', "SettingController@addSMSTemplate");
 Route::get('/editSMSTemplate/{id}', "SettingController@editSMSTemplate");
 Route::post('/updateSMSTemplate', "SettingController@updateSMSTemplate");

 Route::get('/emailTemplatePage', "SettingController@emailTemplatePage");
 Route::get('/emailSMSIntegration', "SettingController@emailSMSIntegration");
 Route::post('/addEmailTemplate', "SettingController@addEmailTemplate");
 Route::post('/updateEmailCredentials', "SettingController@updateEmailCredentials");
 Route::post('/updateSMSCredentials', "SettingController@updateSMSCredentials");
 Route::get('/editEmailTemplate/{id}', "SettingController@editEmailTemplate");
 Route::post('/updateEmailTemplate', "SettingController@updateEmailTemplate");

 Route::get('/invoiceSettingPage', "SettingController@invoiceSettingPage");
 Route::post('/updateInvoiceSetting', "SettingController@updateInvoiceSetting");
 Route::get('/quotationSettingPage', "SettingController@quotationSettingPage");
 Route::get('/incomeCategaoryPage', "SettingController@incomeCategaoryPage");
 Route::get('/expensesCategaoryPage', "SettingController@expensesCategaoryPage");

 Route::get('/leadStatusPage', "SettingController@leadStatusPage");
 Route::post('/adddLeadStatus', "SettingController@adddLeadStatus");
 Route::get('/getLeadStatusData/{id}', "SettingController@getLeadStatusData");
 Route::post('/updatedLeadStatus', "SettingController@updatedLeadStatus");
 Route::get('/leadStatusDestroy/{id}', "SettingController@leadStatusDestroy");

 Route::get('/leadSourcePage', "SettingController@leadSourcePage");
 Route::post('/adddLeadSource', "SettingController@adddLeadSource");
 Route::get('/getLeadSourceData/{id}', "SettingController@getLeadSourceData");
 Route::post('/updatedLeadSource', "SettingController@updatedLeadSource");
 Route::get('/leadSourceDestroy/{id}', "SettingController@leadSourceDestroy");

 Route::get('/cronJobPage', "SettingController@cronJobPage");
 Route::get('/systemUpadtePage', "SettingController@systemUpadtePage");

 Route::get('/goodsTypePage', "SettingController@goodsTypePage");
 Route::post('/adddGoodsType', "SettingController@adddGoodsType");
 Route::get('/getGoodsTypeData/{id}', "SettingController@getGoodsTypeData");
 Route::post('/updateGoodsType', "SettingController@updateGoodsType");

 Route::get('/vehiclePage', "SettingController@vehiclePage");
 Route::post('/addVehicle', "SettingController@addVehicle");
 Route::get('/getVehicleData/{id}', "SettingController@getVehicleData");
 Route::post('/updatedVehicle', "SettingController@updateVehicle");

 Route::get('/packingMaterialPage', "SettingController@packingMaterialPage");
 Route::get('/getPackingMaterialData/{id}', "SettingController@getPackingMaterialData");
 Route::post('/updatePackingMaterial', "SettingController@updatePackingMaterial");
 Route::get('/packingMaterialDestroy/{id}', "SettingController@packingMaterialDestroy");

 Route::get('/transportAgentPage', "SettingController@transportAgentPage");
 Route::post('/addTransportAgentName', "SettingController@addTransportAgentName");
 Route::get('/gettransAgentData/{id}', "SettingController@gettransAgentData");
 Route::post('/updatetransportAgent', "SettingController@updatetransportAgent");
 Route::get('/transAgentDestroy/{id}', "SettingController@transAgentDestroy");

 Route::get('/additionalCFTPage', "SettingController@additionalCFTPage");
 Route::post('/addAdditionalCFT', "SettingController@addAdditionalCFT");
 Route::get('/getAdditionalCFTData/{id}', "SettingController@getAdditionalCFTData");
 Route::post('/updateAdditionalCFT', "SettingController@updateAdditionalCFT");

 Route::get('/kilometerWiseAmountPage', "SettingController@kilometerWiseAmountPage");
 Route::get('/getChargesData/{id}', "SettingController@getChargesData");
 Route::get('/getkmWiseChargesData/{id}', "SettingController@getkmWiseChargesData");
 Route::post('/updateKmWiseCharges', "SettingController@updateKmWiseCharges");


 Route::get('/backupDatabasePage', "SettingController@backupDatabasePage");
 Route::post('/takeDatabaseBackup', "SettingController@takeDatabaseBackup");
 Route::get('/backupDestroy/{id}', "SettingController@backupDestroy");

 Route::get('/articalPage', "SettingController@articalPage");
 Route::post('/addArticals', "SettingController@addArticals");

 Route::get('/offExpCategory', "SettingController@offExpCategory");
 Route::post('/addOffExpCategory', "SettingController@addOffExpCategory");
 Route::get('/getOffExpCategoryData/{id}', "SettingController@getOffExpCategoryData");
 Route::post('/updateOffExpCategory', "SettingController@updateOffExpCategory");
 Route::get('/categoryDestroy/{id}', "SettingController@categoryDestroy");


 Route::post('/SettingController/upload/{id}', "SettingController@upload");
 Route::post('/SettingController/auth_registration', "SettingController@auth_registration");

 Route::get('/SettingController/sidebar', "SettingController@sidebar");

/* Dashboard */ 
 Route::get('/dashboard/', "DashboardController@index");
 Route::get('getSearchBarData/{id}', "DashboardController@getSearchBarData");

/* Message */ 
 Route::get('/message/', "MessageController@index");
 Route::get('/SendMessage/', "MessageController@sendmail");
 Route::get('/sendDetails/{id}', "MessageController@sendDetails");
 Route::get('/inboxDetails/{id}/{replayidid}', "MessageController@inboxDetails");
 Route::post('MessageController/save/', "MessageController@store");
 Route::post('MessageController/destroy/', "MessageController@destroy");



/* Authentication routes...*/
 Route::get('auth/login', 'Auth\AuthController@getLogin');
 Route::post('auth/login', 'Auth\AuthController@postLogin');
 Route::get('auth/logout', 'Auth\AuthController@getLogout');
 Route::auth();
 Route::resource('permission', 'PermissionsController');


// Route::get('/logout', 'DashboardController@logout');

/*Home shift home or vehicle */

 Route::get('/shiftHome','ShiftingController@shiftHome');
 Route::get('/shiftOffice','ShiftingController@shiftOffice');
 Route::get('/shiftVehicle','ShiftingController@shiftVehicle');
 Route::get('/showArticalList/{id}','ShiftingController@showArticalList');

 Route::post('/shiftingHome/oriDest','ShiftingController@addOriDest');
 Route::post('/shiftingHome/articalsData','ShiftingController@addArticalsList');
 Route::post('/shiftingHome/addContactDetails','ShiftingController@addContactDetails');

 Route::post('/shiftingVehicale/oriDestVec','ShiftingController@addOriDestVec');
 Route::post('/shiftingHome/articalsDataVec','ShiftingController@addArticalsListVec');

/* Dashboard routes*/

/* Enquiry Routes*/
 Route::get('/homeEnquiry','EnquiryController@homeEnquiry');
 Route::get('/getHomeFollowup/{id}', "EnquiryController@getHomeFollowup");
// Route::get('/homeFollowup','EnquiryController@homeEnquiry');
 Route::post('/homeEnquiry/adddashboardEnquiry','EnquiryController@adddashboardEnquiry');
 Route::get('/enquiryEdit/{id}', "EnquiryController@enquiryEdit");
 Route::get('/enquiryDestroy/{id}', "EnquiryController@enquiryDestroy");
 Route::post('/updateEnquiry','EnquiryController@updateEnquiry');
 Route::post('/homeEnquiry/addFollowup','EnquiryController@addFollowup');
 Route::get('/getFollowupId/{id}', "EnquiryController@getFollowupId");
 Route::get('/getFollowupData/{id}', "EnquiryController@getFollowupData");
 Route::get('enquiryDestroy/{id}','EnquiryController@enquiryDestroy');
 Route::get('enquiryDetails/{id}','EnquiryController@enquiryDetails');
 Route::get('/getFollowup/{id}', "EnquiryController@getFollowup");

 /* Sales Routes*/
 Route::get('/invoicePage','SalesController@invoicePage');
 Route::post('/addInvoice','SalesController@addInvoice');
 Route::get('editInvoice/{id}','SalesController@editInvoice');
 Route::post('/updateInvoice','SalesController@updateInvoice');
 Route::get('invoiceDestroy/{id}','SalesController@invoiceDestroy');
 Route::get('/getInvoiceData/{id}', "SalesController@getInvoiceData");
 Route::post('/sendPrintInvoice', "SalesController@sendPrintInvoice");
 Route::get('/invoiceDetails/{id}','SalesController@invoiceDetails');

 Route::get('/quotationPage','SalesController@quotationPage');
 Route::post('/addQuotation','SalesController@addQuotation');
 Route::post('/sendPrintQuotation', "SalesController@sendPrintQuotation");
 Route::get('/editQuotation/{id}','SalesController@editQuotation');
 Route::post('/updateQuotation','SalesController@updateQuotation');
 Route::get('/quotationDetails/{id}','SalesController@quotationDetails');
 Route::get('/quotationDestroy/{id}','SalesController@quotationDestroy');

 Route::get('/paymentReceiptPage','SalesController@paymentReceiptPage');
 Route::get('/getPaymentData/{id}', "SalesController@getPaymentData");
 Route::post('/addPaymentRecp','SalesController@addPaymentRecp');
 Route::post('/sendPrintPaymentRcp','SalesController@sendPrintPaymentRcp');
 Route::get('paymentRcpDestroy/{id}','SalesController@paymentRcpDestroy');
 Route::get('paymentRcpDetails/{id}','SalesController@paymentRcpDetails');

 Route::get('/transportPaymentPage','SalesController@transportPaymentPage');
 Route::get('/getTransPaymentData/{id}', "SalesController@getTransPaymentData");
 Route::post('/addTransPayReceipt','SalesController@addTransPayment');
 Route::post('/sendPrintTransPayRcp','SalesController@sendPrintTransPayRcp');
 Route::get('transPaymentDestroy/{id}','SalesController@transPaymentDestroy');

 Route::get('getQuotationData/{id}', "SalesController@getQuotationData");

 Route::get('/shippingExpensesPage','SalesController@shippingExpensesPage');
 Route::post('/addSrcDestShipExpanses','SalesController@addSrcDestShipExpanses');
 Route::get('getShippingSourceData/{id}', "SalesController@getShippingSourceData");
 Route::get('ShippingSourceDataDestroy/{id}', "SalesController@ShippingSourceDataDestroy");

 Route::get('/officeExpensesPage','SalesController@officeExpensesPage');
 Route::post('/addOfficeExpanses','SalesController@addOfficeExpanses');
 Route::get('officeExpDestroy/{id}', "SalesController@officeExpDestroy");

 /* Survey Plan Routes*/
 Route::get('/ownSurveyPage','SurveyPlanController@ownSurveyPage');
 Route::get('/surveySchedule','SurveyPlanController@surveySchedule');
// Route::get('/articalsList','SurveyPlanController@surveyArticals');
 Route::post('/ownSurveyPage/addOwnSurvey','SurveyPlanController@addOwnSurvey');
 Route::get('/importArticlesHome/{id}','SurveyPlanController@importArticlesHome');
 Route::get('/editArticlesHome/{id}','SurveyPlanController@editArticlesHome');
 Route::post('/updateArticalListData','SurveyPlanController@updateArticalListData');
 Route::get('/confirmJobPage','SurveyPlanController@confirmJobPage');
 Route::get('/getConsignmentData/{id}', "SurveyPlanController@getConsignmentData");
 Route::get('/getConsignmentResult/{id}', "SurveyPlanController@getConsignmentResult");
 Route::get('/getCustomerData/{id}', "SurveyPlanController@getCustomerData");
 Route::get('/checkSurveyComplete/{id}', "SurveyPlanController@checkSurveyComplete");
 Route::get('/checkSurveyForEdit/{id}', "SurveyPlanController@checkSurveyForEdit");
 Route::get('/getSurveyEditData/{id}', "SurveyPlanController@getSurveyEditData");
 Route::get('/getConfirmJobData/{id}', "SurveyPlanController@getConfirmJobData");
 Route::post('/addConfirmJob','SurveyPlanController@addConfirmJob');
 Route::get('/editConfirmJob/{id}', "SurveyPlanController@editConfirmJob");
 Route::post('/updateConfirmJob','SurveyPlanController@updateConfirmJob');
 Route::get('surveyDestroy/{id}','SurveyPlanController@surveyDestroy');
 Route::get('confirmJobDestroy/{id}','SurveyPlanController@confirmJobDestroy');
 Route::get('surveyDetails/{id}','SurveyPlanController@surveyDetails');
 Route::get('confirmJobDetails/{id}','SurveyPlanController@confirmJobDetails');

 Route::get('/editSchedule/{id}', "SurveyPlanController@editSchedule");
 Route::post('/updateSchedule','SurveyPlanController@updateSchedule');
 Route::get('scheduleDestroy/{id}','SurveyPlanController@scheduleDestroy');

 Route::get('/packingListPage','PackingController@packingListPage');
 Route::post('/packingListPage/addPackingList','PackingController@addPackingList');
 Route::get('/packingListEdit/{id}', "PackingController@packingListEdit");
 Route::post('/updatePackingList', "PackingController@updatePackingList");
 Route::get('packingDestroy/{id}','PackingController@packingDestroy');
 Route::get('packingListDetails/{id}','PackingController@packingListDetails');
 Route::get('checkPackingListData/{id}','PackingController@checkPackingListData');
 Route::get('getIamgeData/{id}','PackingController@getIamgeData');
 Route::get('getPackingData/{id}','PackingController@getPackingData');

 Route::get('/transportEnquiryPage','TrasnportController@transportEnquiryPage');
 Route::post('/addTransportEnquiry','TrasnportController@addTransportEnquiry');
 Route::get('/editTransEnq/{id}', "TrasnportController@editTransEnq");
 Route::post('/updateTransEnq','TrasnportController@updateTransEnq');
 Route::get('/transportEnqDestroy/{id}', "TrasnportController@transportEnqDestroy");
 Route::get('/getAgentData/{id}', "TrasnportController@getAgentData");

 Route::get('/deliveryPage','DeliveryController@deliveryPage');
 Route::get('/displaydeliveryDetails/{id}','DeliveryController@displaydeliveryDetails');
 Route::post('addDelivery','DeliveryController@addDelivery');
 Route::get('editDelivery/{id}','DeliveryController@editDelivery');
 Route::post('updateDelivery','DeliveryController@updateDelivery');
 Route::get('deliveryDestroy/{id}','DeliveryController@deliveryDestroy');
 Route::post('/sendPrintDelivaryForm','DeliveryController@sendPrintDelivaryForm');
 Route::get('getDeliveryData/{id}','DeliveryController@getDeliveryData');

 Route::get('/trackingPage','TrackingController@trackingPage');
 Route::post('addTrackingData','TrackingController@addTrackingData');
 Route::get('editTrackDeatils/{id}','TrackingController@editTrackDeatils');
 Route::post('updateTrackingData','TrackingController@updateTrackingData');
 Route::get('trackDeatilsDestroy/{id}','TrackingController@trackDeatilsDestroy');
 Route::get('getTrackingData/{id}','TrackingController@getTrackingData');
 Route::get('/feedbackPage','TrackingController@feedbackPage');
 Route::get('getFeedBackData/{id}','TrackingController@getFeedBackData');
 Route::post('addFeedbackData','TrackingController@addFeedbackData');
 Route::get('feedBackDeatilsDestroy/{id}','TrackingController@feedBackDeatilsDestroy');


 Route::get('/calenderPage','CalendarController@calenderPage');
 Route::get('getCalendarData/{id}','CalendarController@getCalendarData');

 // Report page
 Route::get('/allReportPage','ReportController@allReportPage');

//Invetory Report route
 Route::get('/enquiryReportPage','ReportController@enquiryReportPage');
 Route::post('/enquiryReportPage','ReportController@enquiryReportPage');
// Route::get('getEnquiryReportData/{id}','ReportController@getEnquiryReportData');
 Route::get('/surveyReportPage','ReportController@surveyReportPage');
 Route::post('/surveyReportPage','ReportController@surveyReportPage');
// Route::get('getSurveyReportData/{id}','ReportController@getSurveyReportData');
 Route::get('/quotationReportPage','ReportController@quotationReportPage');
 Route::get('getQuotReportData/{id}','ReportController@getQuotReportData');
 Route::get('/transportReportPage','ReportController@transportReportPage');
 Route::get('getTransReportData/{id}','ReportController@getTransReportData');
 Route::get('/deliveryReportPage','ReportController@deliveryReportPage');
 Route::get('getDeliveryReportData/{id}','ReportController@getDeliveryReportData');
 Route::get('/packingListReoprtPage','ReportController@packingListReoprtPage');
 Route::post('packingListReoprtPage','ReportController@packingListReoprtPage');

 Route::get('/feedbackReportPage','ReportController@feedbackReportPage');
 Route::get('getFeedbackReportData/{id}','ReportController@getFeedbackReportData');

 Route::get('/surveyPersonReportPage','ReportController@surveyPersonReportPage');
 Route::get('getSurveyPersonReportData/{id}','ReportController@getSurveyPersonReportData');

//Transition Report Route
 Route::get('/shipExpReportPage','ReportController@shipExpReportPage');
 Route::get('getShipExpReportData/{id}','ReportController@getShipExpReportData');
 Route::get('/paymentReportPage','ReportController@paymentReportPage');
 Route::get('getPayReportData/{id}','ReportController@getPayReportData');
 Route::get('/transPayReport','ReportController@transPayReport');
 Route::get('getTransPayReportData/{id}','ReportController@getTransPayReportData');
 Route::get('/offExpReportPage','ReportController@offExpReportPage');
 Route::get('getOffExpReportData/{id}','ReportController@getOffExpReportData');

 //Analysis Report Route
 Route::get('/insuranceReportPage','ReportController@insuranceReportPage');
 Route::get('getinsuranceReportData/{id}','ReportController@getinsuranceReportData');
 Route::get('/tdsReportPage','ReportController@tdsReportPage');
 Route::get('getTdsReportData/{id}','ReportController@getTdsReportData');
 Route::get('/profitSheetReoprtPage','ReportController@profitSheetReoprtPage');
 Route::get('getProfitSheetReportData/{id}','ReportController@getProfitSheetReportData');
 Route::get('/cityWiseReportPage','ReportController@cityWiseReportPage');
 Route::get('getCityWiseReportData/{id}','ReportController@getCityWiseReportData');

 Route::get('/serviceTaxReportPage','ReportController@serviceTaxReportPage');
 Route::get('getServiceTaxReportData/{id}','ReportController@getServiceTaxReportData');

 Route::get('/documentPrintingPage','ReportController@documentPrintingPage');

//printing route
 Route::get('surveyPrinting','ReportController@surveyPrinting');
 Route::post('printingPage','ReportController@printingPage');

 Route::get('editArtical/{id}','SettingController@editArtical');
 Route::post('updateArticals','SettingController@updateArticals');
 Route::get('deleteArtical/{id}','SettingController@deleteArtical');