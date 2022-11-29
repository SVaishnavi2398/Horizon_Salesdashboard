<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RolesController;
//use App\Http\Controllers\API\NewusersController;
use App\Http\Controllers\API\GroupsController;
use App\Http\Controllers\API\TeamsController;
use App\Http\Controllers\API\ProjectsController;
use App\Http\Controllers\API\SubprojectsController;
use App\Http\Controllers\API\RegionsController;
use App\Http\Controllers\API\SubregionsController;
use App\Http\Controllers\API\DesignationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\ProjectallocationsController;
use App\Http\Controllers\API\TeamStatusController;
use App\Http\Controllers\API\TeamleadersController;
use App\Http\Controllers\API\TeamdetailsController;
use App\Http\Controllers\API\EmpStatusController;
use App\Http\Controllers\API\DebtorcompanydetController;
use App\Http\Controllers\API\EmpCommentsController;
use App\Http\Controllers\API\EmpDocumentsController;
use App\Http\Controllers\API\BookingStatusController;
use App\Http\Controllers\API\PayoutStatusController;
use App\Http\Controllers\API\LeadsourceController;
use App\Http\Controllers\API\ClientdetailsController;
use App\Http\Controllers\API\ChannelpartnerController;
use App\Http\Controllers\API\SalesdetailsController;
use App\Http\Controllers\API\ClientpaymentscheduleController;
use App\Http\Controllers\API\SalesdocumentsController;
use App\Http\Controllers\API\SalescommentsController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\ReportsController;
use App\Http\Controllers\API\ModulesController;
use App\Http\Controllers\API\ModulefieldsController;
use App\Http\Controllers\API\MonthsController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\API\QuarterlyIncentiveController;
use App\Http\Controllers\API\HalfyearincentiveController;
use App\Http\Controllers\API\YearIncentiveController;


////////// SALARY MODULE ///////////////////////
use App\Http\Controllers\API\Salary\SalarypackageController;
use App\Http\Controllers\API\Salary\AdvancesalaryController;
use App\Http\Controllers\API\Salary\AdvanceemiController;
use App\Http\Controllers\API\Salary\MonthlytargetController;
use App\Http\Controllers\API\Salary\MonthlysalaryController;
use App\Http\Controllers\API\Salary\MonthlySalary1Controller;


////////// INVOICES MODULE ////////////////
use App\Http\Controllers\API\InvoiceController;
use App\Http\Controllers\API\Inv_statusController;
use App\Http\Controllers\API\ReceiptDetailsController;
use App\Http\Controllers\API\CreditNoteController;
use App\Http\Controllers\API\GstFillingDetailsController;
use App\Http\Controllers\API\InvoiceMultiController;
use App\Http\Controllers\API\InvoicedetidsController;
use App\Http\Controllers\API\DealdetailsController;
use App\Http\Controllers\API\InvoicecommentsController;

/////////// GST R1 //////////////////

use App\Http\Controllers\API\GstjsonController;
use App\Http\Controllers\API\Gstr2aController;
use App\Http\Controllers\API\B2binvoiceController;
use App\Http\Controllers\API\Gstr_3b;
use App\Http\Controllers\API\MonthController;
use App\Http\Controllers\API\MonthlyIncentiveController;
use App\Http\Controllers\API\IncentiveController;
use App\Http\Controllers\API\IncentiverangeController;
use App\Http\Controllers\API\TdsRatecontroller;
use App\Http\Controllers\API\WalkindealsController;

use App\Http\Controllers\API\LeadsgivenController;
use App\Http\Controllers\API\WeeklyleadsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('roles', RolesController::class);

//Route::apiResource('newusers', NewusersController::class);

Route::apiResource('groups', GroupsController::class);

Route::apiResource('teams', TeamsController::class);

Route::apiResource('projects', ProjectsController::class);

Route::apiResource('subprojects', SubprojectsController::class);

Route::apiResource('regions', RegionsController::class);

Route::apiResource('subregions', SubregionsController::class);

Route::apiResource('designations', DesignationsController::class);

Route::apiResource('users', UsersController::class);

Route::apiResource('projectallocations', ProjectallocationsController::class);

Route::apiResource('team_status', TeamStatusController::class);

Route::apiResource('team_leaders', TeamleadersController::class);

Route::apiResource('teamdetails', TeamdetailsController::class);

Route::apiResource('emp_status', EmpStatusController::class);

Route::apiResource('debtor_company_det', DebtorcompanydetController::class);

Route::apiResource('emp_comments', EmpCommentsController::class);

Route::apiResource('emp_documents', EmpDocumentsController::class);

Route::apiResource('clientdetails', ClientdetailsController::class);

Route::apiResource('channelpartner', ChannelpartnerController::class);

Route::apiResource('booking_status', BookingStatusController::class);

Route::apiResource('payout_status', PayoutStatusController::class);

Route::apiResource('leadsource', LeadsourceController::class);

Route::apiResource('salesdetails', SalesdetailsController::class);

Route::apiResource('client_payment_schedule', ClientpaymentscheduleController::class);

Route::apiResource('sales_documents', SalesdocumentsController::class);

Route::apiResource('sales_comments', SalescommentsController::class);

Route::apiResource('invoice_comments', InvoicecommentsController::class);

Route::apiResource('emp_documents', ImageController::class);

Route::apiResource('reports', ReportsController::class);

Route::apiResource('modules', ModulesController::class);

Route::apiResource('module_fields', ModulefieldsController::class);

Route::apiResource('months', MonthsController::class);


//////////////  SALARY MODULE ///////////////////

Route::apiResource('salary_package', SalarypackageController::class);

Route::apiResource('advance_salary', AdvancesalaryController::class);

Route::apiResource('advance_emi_details', AdvanceemiController::class);

Route::apiResource('monthly_target', MonthlytargetController::class);

Route::apiResource('monthly_salary', MonthlysalaryController::class);
// newww
Route::apiResource('monthlysalary1', MonthlySalary1Controller::class);

Route::apiResource('monthly_salary1', MonthlySalary1Controller::class);

Route::apiResource('attendance', AttendanceController::class);

/////////////  INOICES MODULE /////////////////

Route::apiResource('invoice', InvoiceController::class);
Route::apiResource('inv_status', Inv_statusController::class);
Route::apiResource('receiptdetails', ReceiptDetailsController::class);
Route::apiResource('credit_note', CreditNoteController::class);
Route::apiResource('gst_fillingdetails', GstFillingDetailsController::class);
Route::apiResource('invoicedetids', InvoicedetidsController::class);
Route::apiResource('invoice_multi', InvoiceMultiController::class);

/////////// GST R1 //////////////////

Route::apiResource('gst_json', GstjsonController::class);
Route::apiResource('gstr2a', Gstr2aController::class);
Route::apiResource('b2binvoices', B2binvoiceController::class);

///////////////////////// GSR3B AAPI    ////////////////////
Route::apiResource('gstr3b', Gstr_3b::class);
Route::apiResource('month', MonthController::class);
Route::apiResource('incentives', IncentiveController::class);
Route::apiResource('monthlyince', MonthlyIncentiveController::class);
Route::apiResource('incentiverange', IncentiverangeController::class);
Route::apiResource('tds_rate', TdsRatecontroller::class);
Route::apiResource('dealdetail', DealdetailsController::class);

Route::apiResource('quarterly_incentive', QuarterlyIncentiveController::class);
Route::apiResource('halfyear_incentive', HalfyearincentiveController::class);
Route::apiResource('year_incentive', YearIncentiveController::class);
Route::apiResource('Walkindeals', WalkindealsController::class);


Route::apiResource('leadsgiven', LeadsgivenController::class);
Route::apiResource('weeklyleads', WeeklyleadsController::class);


Route::group([

    'middleware' => 'api',

], function ($router) {

    Route::post('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('/signup', [App\Http\Controllers\AuthController::class,'signup'])->name('signup');
    Route::get('/dropdownlist', [App\Http\Controllers\API\SalesdetailsController::class,'getTableColumns'])->name('getTableColumns');
    Route::get('/getSalesCount', [App\Http\Controllers\API\SalesdetailsController::class,'getSalesCount'])->name('getSalesCount');
    Route::get('/getApply/{data}', [App\Http\Controllers\API\SalesdetailsController::class,'getApply'])->name('getApply');
    Route::get('/generate/{id}', [App\Http\Controllers\API\ReportsController::class,'generatereports'])->name('generatereports');
    Route::get('/getid', [App\Http\Controllers\API\ReportsController::class,'getid'])->name('getid');
    Route::get('/fields', [App\Http\Controllers\API\ModulefieldsController::class,'fields'])->name('fields');
    Route::get('/calculation', [App\Http\Controllers\API\ReportsController::class,'calculation'])->name('calculation');
    Route::get('/calsum/{id}', [App\Http\Controllers\API\ReportsController::class,'calsum'])->name('calsum');
    Route::get('/calavrg/{id}', [App\Http\Controllers\API\ReportsController::class,'calavrg'])->name('calavrg');
    Route::get('/getteam/{id}', [App\Http\Controllers\API\TeamleadersController::class,'getteam'])->name('getteam');
    Route::get('/invoicejoin/{id}', [App\Http\Controllers\API\GstjsonController::class,'invoicejoin'])->name('invoicejoin');
    Route::get('/getSubproject/{id}', [App\Http\Controllers\API\SubprojectsController::class,'getSubproject'])->name('getSubproject');
    Route::get('/getSalarypackageData/{id}', [App\Http\Controllers\API\Salary\SalarypackageController::class,'getSalarypackageData'])->name('getSalarypackageData');
   
   
///////////////////////   for multiple client in invoice/////////////

    Route::get('/getUser/{id}', [App\Http\Controllers\API\UsersController::class,'getUser'])->name('getUser');
    Route::get('/getCgst/{id}', [App\Http\Controllers\API\InvoiceController::class,'getCgst'])->name('getCgst');
    Route::get('/getsalarybyuser_id/{id}', [App\Http\Controllers\API\Salary\MonthlytargetController::class,'getsalarybyuser_id'])->name('getsalarybyuser_id');
    Route::get('/getsales/{id}', [App\Http\Controllers\API\SalesdetailsController::class,'getsales'])->name('getsales');
    Route::get('/getReceivableamt/{id}', [App\Http\Controllers\API\InvoiceController::class,'getReceivableamt'])->name('getReceivableamt');
    Route::get('/getclientid/{id}', [App\Http\Controllers\API\InvoiceController::class,'getclientid'])->name('getclientid');
    Route::get('/getlastid', [App\Http\Controllers\API\InvoiceController::class,'getlastid'])->name('getlastid');
    
    
    
    // GSRT1 API
    Route::get('/jsonmonthjoin', [App\Http\Controllers\API\GstjsonController::class,'jsonmonthjoin'])->name('jsonmonthjoin');
    Route::get('/invmonthjoin', [App\Http\Controllers\API\GstjsonController::class,'invmonthjoin'])->name('invmonthjoin');
    Route::post('/jsonupload', [App\Http\Controllers\API\GstjsonController::class,'jsonupload'])->name('jsonupload');
    Route::post('/updateCreate', [App\Http\Controllers\API\GstjsonController::class,'updateCreate'])->name('updateCreate');
   
    // GSR2A AND B2B iNVOICE API
    // Route::post('/invoice_comments', [App\Http\Controllers\API\InvoiceController::class,'invoice_comments'])->name('invoice_comments');
    Route::post('/uploadgstr2a', [App\Http\Controllers\API\Gstr2aController::class,'uploadgstr2a'])->name('uploadgstr2a');
    Route::post('/updateCreate2A', [App\Http\Controllers\API\Gstr2aController::class,'updateCreate2A'])->name('updateCreate2A');
    Route::post('/updateCreateB2B', [App\Http\Controllers\API\B2binvoiceController::class,'updateCreateB2B'])->name('updateCreateB2B');
    Route::get('/gstr2amonthj', [App\Http\Controllers\API\Gstr2aController::class,'gstr2amonthj'])->name('gstr2amonthj');
    Route::get('/b2bmonthj', [App\Http\Controllers\API\Gstr2aController::class,'b2bmonthj'])->name('b2bmonthj');
    Route::get('/invoicegstr2a/{id}', [App\Http\Controllers\API\Gstr2aController::class,'invoicegstr2a'])->name('invoicegstr2a');
    Route::get('/showId/{id}', [App\Http\Controllers\API\B2binvoiceController::class,'showId'])->name('showId');
    // Route::post('/invoice_comments', [App\Http\Controllers\API\InvoicecommentsController::class,'invoice_comments'])->name('invoice_comments');


    // GSR3B AAPI
    Route::post('/updateCreate3B', [App\Http\Controllers\API\Gstr_3b::class,'updateCreate3B'])->name('updateCreate3B');
    Route::get('/getMonth/{id}', [App\Http\Controllers\API\Gstr_3b::class,'getMonth'])->name('getMonth');
    Route::post('/in_Maha', [App\Http\Controllers\API\InvoiceController::class,'in_Maha'])->name('in_Maha');
    Route::post('/out_of_Maha', [App\Http\Controllers\API\InvoiceController::class,'out_of_Maha'])->name('out_of_Maha');
    Route::post('/in_Maha_pur', [App\Http\Controllers\API\B2binvoiceController::class,'in_Maha_pur'])->name('in_Maha_pur');
    Route::post('/out_Maha_pur', [App\Http\Controllers\API\B2binvoiceController::class,'out_Maha_pur'])->name('out_Maha_pur');
    
    //////////// Incentive ///////////
      // Route::get('/monthlyinceData/{id}', [App\Http\Controllers\API\MonthlyIncentiveController::class,'monthlyinceData'])->name('monthlyinceData');
    // Route::post('/lead_count', [App\Http\Controllers\API\MonthlyIncentiveController::class,'lead_count'])->name('lead_count');
    Route::post('/inceCount', [App\Http\Controllers\API\MonthlyIncentiveController::class,'inceCount'])->name('inceCount');
    Route::post('/updateCreateInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'updateCreateInce'])->name('updateCreateInce');
    Route::get('/inceBusiness', [App\Http\Controllers\API\IncentiverangeController::class,'inceBusiness'])->name('inceBusiness');
    Route::post('/SourcingData', [App\Http\Controllers\API\MonthlyIncentiveController::class,'SourcingData'])->name('SourcingData');
    Route::post('/ClosingData', [App\Http\Controllers\API\MonthlyIncentiveController::class,'ClosingData'])->name('ClosingData');
    // Route::get('/inceCount1', [App\Http\Controllers\API\MonthlyIncentiveController::class,'inceCount1'])->name('inceCount1');
    Route::get('/getUserActive', [App\Http\Controllers\API\UsersController::class,'getUserActive'])->name('getUserActive');
    // Route::patch('/updateInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'updateInce'])->name('updateInce');
    Route::post('/update1', [App\Http\Controllers\API\MonthlyIncentiveController::class,'update1'])->name('update1');
    Route::post('/update2', [App\Http\Controllers\API\MonthlyIncentiveController::class,'update2'])->name('update2');
    Route::post('/update3', [App\Http\Controllers\API\MonthlyIncentiveController::class,'update3'])->name('update3');
    Route::post('/update4', [App\Http\Controllers\API\MonthlyIncentiveController::class,'update4'])->name('update4');
    Route::post('/updatepiC', [App\Http\Controllers\API\MonthlyIncentiveController::class,'updatepiC'])->name('updatepiC');
    Route::post('/updatepiS', [App\Http\Controllers\API\MonthlyIncentiveController::class,'updatepiS'])->name('updatepiS');
    Route::post('/invoiceInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'invoiceInce'])->name('invoiceInce');
    Route::post('/invoiceInceS', [App\Http\Controllers\API\MonthlyIncentiveController::class,'invoiceInceS'])->name('invoiceInceS');
    Route::get('/invoiceInceMulti/{id}', [App\Http\Controllers\API\MonthlyIncentiveController::class,'invoiceInceMulti'])->name('invoiceInceMulti');
    Route::get('/getreceiptdata/{id}', [App\Http\Controllers\API\ReceiptDetailsController::class,'getreceiptdata'])->name('getreceiptdata');
    Route::post('/upCreReceipt', [App\Http\Controllers\API\ReceiptDetailsController::class,'upCreReceipt'])->name('upCreReceipt');
    Route::get('/receiptD', [App\Http\Controllers\API\ReceiptDetailsController::class,'receiptD'])->name('receiptD');
    Route::post('/inceReceiptData', [App\Http\Controllers\API\MonthlyIncentiveController::class,'inceReceiptData'])->name('inceReceiptData');
    Route::post('/SourSaleInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'SourSaleInce'])->name('SourSaleInce');
    Route::post('/CloseSaleInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'CloseSaleInce'])->name('CloseSaleInce');
    Route::post('/CloInvoiceInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'CloInvoiceInce'])->name('CloInvoiceInce');
    Route::post('/SourInvoiceInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'SourInvoiceInce'])->name('SourInvoiceInce');
    Route::post('/SourReceInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'SourReceInce'])->name('SourReceInce');
    Route::post('/CloseReceInce', [App\Http\Controllers\API\MonthlyIncentiveController::class,'CloseReceInce'])->name('CloseReceInce');
    Route::post('/getReceiptClose', [App\Http\Controllers\API\MonthlyIncentiveController::class,'getReceiptClose'])->name('getReceiptClose');
    Route::post('/getReceiptSou', [App\Http\Controllers\API\MonthlyIncentiveController::class,'getReceiptSou'])->name('getReceiptSou');
    // Route::get('/CloseSaleInce1', [App\Http\Controllers\API\MonthlyIncentiveController::class,'CloseSaleInce1'])->name('CloseSaleInce1');
    Route::get('/getTeamData/{id}', [App\Http\Controllers\API\MonthlyIncentiveController::class,'getTeamData'])->name('getTeamData');
    Route::get('/IncenUserwise/{id}', [App\Http\Controllers\API\MonthlyIncentiveController::class,'IncenUserwise'])->name('IncenUserwise');
    Route::get('/getTeamUsers', [App\Http\Controllers\API\MonthlyIncentiveController::class,'getTeamUsers'])->name('getTeamUsers');
    Route::get('/invoiceInceS1', [App\Http\Controllers\API\MonthlyIncentiveController::class,'invoiceInceS1'])->name('invoiceInceS1');

    /////////////////////////////////// Deal Details ///////////////////////
    Route::post('/getteamdetails', [App\Http\Controllers\API\DealdetailsController::class,'getteamdetails'])->name('getteamdetails');
    Route::post('/getuserdata', [App\Http\Controllers\API\DealdetailsController::class,'getuserdata'])->name('getuserdata');
    Route::post('/getattendance', [App\Http\Controllers\API\DealdetailsController::class,'getattendance'])->name('getattendance');
    Route::get('/username', [App\Http\Controllers\API\DealdetailsController::class,'username'])->name('username');
    Route::get('/userdetails/{id}', [App\Http\Controllers\API\DealdetailsController::class,'userdetails'])->name('userdetails');
    Route::get('/empdata/{id}', [App\Http\Controllers\API\DealdetailsController::class,'empdata'])->name('empdata');
    Route::get('/single_user/{id}', [App\Http\Controllers\API\DealdetailsController::class,'single_user'])->name('single_user');
    Route::get('/username1/{id}', [App\Http\Controllers\API\DealdetailsController::class,'username1'])->name('username1');
    Route::get('/datedata/{id}', [App\Http\Controllers\API\DealdetailsController::class,'datedata'])->name('datedata');
    Route::post('/datefilter', [App\Http\Controllers\API\DealdetailsController::class,'datefilter'])->name('datefilter');

    Route::get('/getuserdetails', [App\Http\Controllers\API\WalkindealsController::class,'getuserdetails'])->name('getuserdetails');

  //////////// Quartely Incentive ///////////
  Route::post('/upCreQuarInce', [App\Http\Controllers\API\QuarterlyIncentiveController::class,'upCreQuarInce'])->name('upCreQuarInce');
  Route::post('/SourceQuaData', [App\Http\Controllers\API\QuarterlyIncentiveController::class,'SourceQuaData'])->name('SourceQuaData');
  Route::post('/quarterlyData', [App\Http\Controllers\API\QuarterlyIncentiveController::class,'quarterlyData'])->name('quarterlyData');
  Route::post('/updateQuarterly', [App\Http\Controllers\API\QuarterlyIncentiveController::class,'updateQuarterly'])->name('updateQuarterly');
  Route::get('/quarterlydetails{id}', [App\Http\Controllers\API\QuarterlyIncentiveController::class,'quarterlydetails'])->name('quarterlydetails');
  /////////////////////////// Half Year Incentive /////////////////////////

  Route::post('/upCreHalfInce', [App\Http\Controllers\API\HalfyearincentiveController::class,'upCreHalfInce'])->name('upCreHalfInce');
  Route::post('/SourcehalfyearData', [App\Http\Controllers\API\HalfyearincentiveController::class,'SourcehalfyearData'])->name('SourcehalfyearData');
  Route::post('/HalfYearDetails', [App\Http\Controllers\API\HalfyearincentiveController::class,'HalfYearDetails'])->name('HalfYearDetails');
  Route::post('/updatehalfYear', [App\Http\Controllers\API\HalfyearincentiveController::class,'updatehalfYear'])->name('updatehalfYear');
  Route::get('/gethalfyearUser{id}', [App\Http\Controllers\API\HalfyearincentiveController::class,'gethalfyearUser'])->name('gethalfyearUser');

  ////////////////////////////////// Year Incentive ////////////////////////
  Route::post('/upCreYearInce', [App\Http\Controllers\API\YearIncentiveController::class,'upCreYearInce'])->name('upCreYearInce');
  Route::post('/updateCreYear', [App\Http\Controllers\API\YearIncentiveController::class,'updateCreYear'])->name('updateCreYear');
  Route::post('/SourceYearD', [App\Http\Controllers\API\YearIncentiveController::class,'SourceYearD'])->name('SourceYearD');
  Route::post('/YearDetailsInce', [App\Http\Controllers\API\YearIncentiveController::class,'YearDetailsInce'])->name('SourceYearD');
  Route::get('/getyearIncenUser_id{id}', [App\Http\Controllers\API\YearIncentiveController::class,'getyearIncenUser_id'])->name('getyearIncenUser_id');


  Route::post('/attendance_monthwise', [App\Http\Controllers\API\AttendanceController::class,'attendance_monthwise'])->name('attendance_monthwise');
    Route::get('/get_month', [App\Http\Controllers\API\AttendanceController::class,'get_month'])->name('get_month');
    Route::post('/get_teamWise', [App\Http\Controllers\API\AttendanceController::class,'get_teamWise'])->name('get_teamWise');
    Route::post('/post_monthlysalary1', [App\Http\Controllers\API\MonthlySalary1Controller::class,'get_monthlysalary1'])->name('get_monthlysalary1');
    Route::post('/getteamdetails', [App\Http\Controllers\API\DealdetailsController::class,'getteamdetails'])->name('getteamdetails');
    Route::post('/getuserdata', [App\Http\Controllers\API\DealdetailsController::class,'getuserdata'])->name('getuserdata');
    Route::post('/getattendance', [App\Http\Controllers\API\DealdetailsController::class,'getattendance'])->name('getattendance');
    Route::get('/username', [App\Http\Controllers\API\DealdetailsController::class,'username'])->name('username');
    Route::get('/userdetails/{id}', [App\Http\Controllers\API\DealdetailsController::class,'userdetails'])->name('userdetails');
    Route::get('/empdata/{id}', [App\Http\Controllers\API\DealdetailsController::class,'empdata'])->name('empdata');
    Route::get('/single_user/{id}', [App\Http\Controllers\API\DealdetailsController::class,'single_user'])->name('single_user');
    Route::get('/username1/{id}', [App\Http\Controllers\API\DealdetailsController::class,'username1'])->name('username1');
    Route::get('/datedata/{id}', [App\Http\Controllers\API\DealdetailsController::class,'datedata'])->name('datedata');
    Route::post('/datefilter', [App\Http\Controllers\API\DealdetailsController::class,'datefilter'])->name('datefilter');
    Route::post('/dateData', [App\Http\Controllers\API\DealdetailsController::class,'dateData'])->name('dateData');
    Route::post('/getteamdetails1', [App\Http\Controllers\API\WalkindealsController::class,'getteamdetails1'])->name('getteamdetails1');
    Route::get('/getuserdetails', [App\Http\Controllers\API\WalkindealsController::class,'getuserdetails'])->name('getuserdetails');
    Route::get('/getwalkinlist/{id}', [App\Http\Controllers\API\WalkindealsController::class,'getwalkinlist'])->name('getwalkinlist');
    Route::get('/getdata/{id}', [App\Http\Controllers\API\WalkindealsController::class,'getdata'])->name('getdata');
    Route::post('/filterdata', [App\Http\Controllers\API\WalkindealsController::class,'filterdata'])->name('filterdata');
    Route::get('/getclemp/{id}', [App\Http\Controllers\API\WalkindealsController::class,'getclemp'])->name('getclemp');
    Route::get('/getuserid', [App\Http\Controllers\API\WalkindealsController::class,'getuserid'])->name('getuserid');
    Route::get('/getdeals', [App\Http\Controllers\API\WalkindealsController::class,'getdeals'])->name('getdeals');
    Route::get('/leadsgivenview', [App\Http\Controllers\API\LeadsgivenController::class,'leadsgivenview'])->name('leadsgivenview');
    Route::get('/weeklyleadsview', [App\Http\Controllers\API\WeeklyleadsController::class,'weeklyleadsview'])->name('weeklyleadsview');
    Route::post('/updatedateteam', [App\Http\Controllers\API\UsersController::class,'updatedateteam'])->name('updatedateteam');
    
    Route::get('/getbookingid', [App\Http\Controllers\API\SalesdetailsController::class,'getbookingid'])->name('getbookingid');
    Route::get('/pendinginvoice', [App\Http\Controllers\API\InvoiceMultiController::class,'pendinginvoice']);


    Route::post('/monthlysalarydata', [App\Http\Controllers\API\Salary\MonthlySalary1Controller::class,'monthlysalarydata'])->name('monthlysalarydata');
    Route::post('/monthlysalarydata1', [App\Http\Controllers\API\Salary\MonthlySalary1Controller::class,'monthlysalarydata1'])->name('monthlysalarydata1');
    Route::get ('/AdvanceEmi', [App\Http\Controllers\API\Salary\AdvancesalaryController::class,'AdvanceEmi'])->name('AdvanceEmi');
    Route::get ('/Userdata/{id}', [App\Http\Controllers\API\Salary\AdvanceemiController::class,'Userdata'])->name('Userdata');
    Route::get ('/AdvanceDeduction/{id}', [App\Http\Controllers\API\Salary\AdvancesalaryController::class,'AdvanceDeduction'])->name('AdvanceDeduction');
    Route::get ('/UserAdvanceEmi/{id}', [App\Http\Controllers\API\Salary\AdvanceemiController::class,'UserAdvanceEmi'])->name('UserAdvanceEmi');
    Route::get ('/deductamount', [App\Http\Controllers\API\Salary\AdvanceemiController::class,'deductamount'])->name('deductamount');
    Route::post('/updateAdvSal', [App\Http\Controllers\API\Salary\AdvancesalaryController::class,'updateAdvSal'])->name('updateAdvSal');
    Route::get ('/emiAmountId/{user_id}', [App\Http\Controllers\API\Salary\AdvanceemiController::class,'emiAmountId'])->name('emiAmountId');
    Route::get ('/reportdata/{user_id}', [App\Http\Controllers\API\Salary\AdvanceemiController::class,'reportdata'])->name('reportdata');
   Route::get('/EmpData', [App\Http\Controllers\API\Salary\MonthlySalary1Controller::class,'EmpData'])->name('EmpData');
   Route::get ('/reportdata1/{user_id}', [App\Http\Controllers\API\Salary\MonthlySalary1Controller::class,'reportdata1'])->name('reportdata1');
   Route::get ('/dataUser1/{id}', [App\Http\Controllers\API\Salary\AdvanceemiController::class,'dataUser1'])->name('dataUser1');
  



   Route::get('/leadsgivenview', [App\Http\Controllers\API\LeadsgivenController::class,'leadsgivenview'])->name('leadsgivenview');
    Route::get('/weeklyleadsview', [App\Http\Controllers\API\WeeklyleadsController::class,'weeklyleadsview'])->name('weeklyleadsview');
    Route::get('/getempdetails/{id}', [App\Http\Controllers\API\LeadsgivenController::class,'getempdetails'])->name('getempdetails');
    Route::get('/singleemp/{id}', [App\Http\Controllers\API\LeadsgivenController::class,'singleemp'])->name('singleemp');
    Route::get('/single_emp/{id}', [App\Http\Controllers\API\LeadsgivenController::class,'single_emp'])->name('single_emp');
    Route::post('/datesorting', [App\Http\Controllers\API\LeadsgivenController::class,'datesorting'])->name('datesorting');
    Route::get('/teamwise/{id}', [App\Http\Controllers\API\LeadsgivenController::class,'teamwise'])->name('teamwise');
    Route::get('/leadsteams/{id}', [App\Http\Controllers\API\LeadsgivenController::class,'leadsteams'])->name('leadsteams');
    Route::get('/allteamsdata/{id}', [App\Http\Controllers\API\LeadsgivenController::class,'allteamsdata'])->name('allteamsdata');
    Route::get('/single_emp_data/{id}', [App\Http\Controllers\API\LeadsgivenController::class,'single_emp_data'])->name('single_emp_data');
    Route::get('/single_employee/{id}', [App\Http\Controllers\API\WeeklyleadsController::class,'single_employee'])->name('single_employee');
    Route::get('/weeklyteams/{id}', [App\Http\Controllers\API\WeeklyleadsController::class,'weeklyteams'])->name('weeklyteams');
    Route::get('/single_emp_weekly/{id}', [App\Http\Controllers\API\WeeklyleadsController::class,'single_emp_weekly'])->name('single_emp_weekly');
    Route::get('/allleadsdata/{id}', [App\Http\Controllers\API\WeeklyleadsController::class,'allleadsdata'])->name('allleadsdata');
    Route::post('/dateformating', [App\Http\Controllers\API\WeeklyleadsController::class,'dateformating'])->name('dateformating');
    Route::post('/weekwise', [App\Http\Controllers\API\WeeklyleadsController::class,'weekwise'])->name('weekwise');
    Route::post('/weekdata', [App\Http\Controllers\API\WeeklyleadsController::class,'weekdata'])->name('weekdata');
  });


// Protected Routes

//Route::middleware('auth:sanctum')->get('/users', [App\Http\Controllers\API\UsersController::class,'index']);