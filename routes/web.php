<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CitationController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\StallTypescontroller;
use App\Http\Controllers\StallNumberController;
use App\Http\Controllers\ClientRecordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
Login-registration routes
*/
Route::get('/login', [Authcontroller::class, 'login'])->name('login');
Route::post('/login', [Authcontroller::class, 'loginp'])->name('login.p');
Route::get('/registration', [Authcontroller::class, 'registration'])->name('registration');
Route::post('/registration', [Authcontroller::class, 'registrationp'])->name('registrationp');
Route::get('/logout',[Authcontroller::class,'logout'])->name('logout');

/*
Homepage routes
*/
Route::get('/home', function () {return view('home');})->name('homepage');
Route::get('/', function () {return view('welcome');})->name('welcomepage');


// para sa clients
Route::get('/clients', [ClientController::class, 'index'])
->name('clients.index');

Route::get('/clients/add', [ClientController::class, 'addclients'])
->name('clients.addclients');

Route::post('/clients/store', [ClientController::class, 'clientstore'])
->name('clientstore');

Route::delete('/clients/{id}', [ClientController::class, 'deleteClient'])
->name('deleteClient');


Route::get('/clients/edit/{id}', [ClientController::class, 'editClient'])
->name('clients.editclient');

Route::put('/clients/update/{id}', [ClientController::class, 'updateClient'])
->name('updateClient');


//dropdown population sa stall numbers basi sa napili nga stall category/type
Route::get('/get-available-stalls/{stalltype_id}', [ClientInfoController::class, 'getAvailableStalls'])->name('get-available-stalls');








// para sa billings
Route::get('/billingskie',[BillingController:: class, 'index'])
->name('billing.index');

Route::get('/create-billingskie',[BillingController:: class, 'create'])
->name('billing.create');

Route::post('/billingskie', [BillingController::class, 'store'])
->name('billing.store');



Route::delete('/billings/delete/{id}', [BillingController:: class, 'delete'])
->name('billings.delete');

Route::get('/billing-record', [CitationController:: class, 'records']) ->name('billing.record');




// client records







// naa sya sa billing controller arun ma access ang data in general and iwas confusion


 Route::get('/get-dropdown-options',[ClientInfoController::class,'getDropdownOptions']);




 Route::get('/violations',[ViolationController:: class, 'index'])
 ->name('violation.index');
 
 Route::get('/create-violation',[ViolationController:: class, 'create'])
 ->name('violation.create');
 
 Route::post('/violations', [ViolationController::class, 'store'])
 ->name('violation.store');
 
 Route::get('/violations/{violation}/edit', [ViolationController::class, 'edit'])
 ->name('violation.edit');
 
 Route::put('/violations/{violation}', [ViolationController::class, 'update'])
 ->name('violation.update');
 
 Route::delete('/violations/{violation}', [ViolationController::class, 'destroy'])
 ->name('violation.destroy');




// Stall Types
Route::get('/stall-types', [StallTypesController::class, 'index'])
->name('stall-types.index');

Route::get('/stall-types/create', [StallTypesController::class, 'create'])
->name('stall-types.create');

Route::post('/stall-types', [StallTypesController::class, 'store'])
->name('stall-types.store');

Route::get('/stall-types/{stallType}/edit', [StallTypesController::class, 'edit'])
->name('stall-types.edit');

Route::put('/stall-types/{stallType}', [StallTypesController::class, 'update'])
->name('stall-types.update');

Route::delete('/stall-types/{stallType}', [StallTypesController::class, 'destroy'])
->name('stall-types.destroy');

Route::get('/stall-types/{stallType}/stall-numbers/create', [StallNumberController::class, 'create'])
->name('stall-types.stall-numbers.create');


// para sa stall numbers
Route::get('/stall-number/index', [StallNumberController::class, 'index'])->name('stall-number.index');

// Create view for adding new stall numbers
Route::get('/stall-number/create', [StallNumberController::class, 'create'])->name('stall-number.create');

// Store a new stall number
Route::post('/stall-number', [StallNumberController::class, 'store'])->name('stall-number.store');

// Delete a stall number
Route::delete('/stall-number/{stallNumber}', [StallNumberController::class, 'destroy'])->name('stall-number.destroy');

Route::get('/stall-types/{stallType}/view', [StallNumberController::class, 'view'])
->name('stall-types.stallnumbers.view');







Route::post('/stall-types/stall-numbers/store', [StallNumberController::class, 'store'])
->name('stall-types.stallnumbers.store');

Route::delete('/stall-numbers/{stallNumber}', [StallNumberController::class, 'destroy'])
->name('stall-numbers.destroy');




#client info
Route::get('/client_info', [ClientInfoController::class, 'index'])->name('client_info.index');
Route::get('/client_info/add', [ClientInfoController::class, 'addclientinfo'])->name('client_info.add');
Route::post('/client_info/store', [ClientInfoController::class, 'clientinfostore'])->name('client_info.store');
Route::get('/client_info/view/{id}', [ClientInfoController::class, 'view'])->name('client_info.view');
Route::put('/client_info/update/{id}', [ClientInfoController::class, 'updateClient'])->name('client_info.update');
Route::delete('/client_info/delete/{id}', [ClientInfoController::class, 'deleteClient'])->name('client_info.delete');




Route::get('/client_info/violationbilling/{id}', [CitationController::class,'violationbilling'])->name('client_info.violationbilling');




Route::get('/client_info/citation/{stall_number_id}', [CitationController::class,'clientcitation'])->name('client_info.citation');

Route::post('/client_info/store-citation', [CitationController::class,'storeCitation'])->name('client_info.store_citation');

Route::get('/client_info/citation/{stall_id}', [CitationController::class,'viewCitations'])->name('client_info.view_citations');

Route::get('/report-citation/{client_id}/{stall_number_id}', [CitationController::class, 'reportCitationForm'])->name('client_info.report_citation_form');

Route::post('/start-scheduled-sms', [ClientInfoController::class, 'startScheduledSMS'])->name('start-scheduled-sms');




// Route::get('/client_info/citation/{stall_id}',[CitationController::class,'viewCitations'])->name('client_info.citation');
// Route::get('/client_info/report_citation_form/{client_id}/{stall_number_id}', [CitationController::class, 'reportCitationForm'])->name('client_info.report_citation_form');
// Route::get('/client_info/report_citation/{client_id}/{stall_number_id}/{stall_type_id}', [CitationController::class,'reportCitationForm'])->name('client_info.report_citation_form');



