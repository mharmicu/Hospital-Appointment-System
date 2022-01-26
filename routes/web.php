<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Todos;
use App\Http\Livewire\EmployeeLivewire;
use App\Http\Livewire\ProductsLivewire;
use App\Http\Livewire\SalesLivewire;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ChartController;
use App\Http\Livewire\AdminAppointment;
use App\Http\Livewire\Adminpage;
use App\Http\Livewire\AdminViewUser;
use App\Http\Livewire\AppointmentLivewire;
use App\Http\Livewire\HospitalLivewire;
use App\Http\Livewire\AppointmentCancel;
use App\Http\Livewire\AppointmentView;
use App\Http\Livewire\ContactForm;
use App\Http\Livewire\AdminInbox;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\HospitalFaqs;
use App\Http\Livewire\CovidInformation;
use App\Http\Livewire\Maps;
use App\Http\Livewire\MedHistoryLivewire;
use App\Http\Livewire\PersonalInfoLivewire;
use App\Models\MedHistory;
use App\Models\PersonalInfo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route on welcome
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

//user
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//admin
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('adminpage',Adminpage::class)->name('adminpage');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('admin-appointment',AdminAppointment::class)->name('admin-appointment');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('admin-view-user',AdminViewUser::class)->name('admin-view-user');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('admin-inbox',AdminInbox::class)->name('admin-inbox');
});





Route::get('appointment-cancel', AppointmentCancel::class)
->name('appointment-cancel');

Route::get('appointment-livewire', AppointmentLivewire::class)
->name('appointment-livewire');

Route::get('appointment-view', AppointmentView::class)
->name('appointment-view');

Route::get('hospital-livewire', HospitalLivewire::class)
->name('hospital-livewire');

Route::get('hospital-faqs', HospitalFaqs::class)
->name('hospital-faqs');

Route::get('covid-information', CovidInformation::class)
->name('covid-information');

Route::get('hospitals', HospitalLivewire::class)
->middleware(['auth:sanctum', 'verified'])
->name('hospitals');

Route::get('appointments', AppointmentLivewire::class)
->middleware(['auth:sanctum', 'verified'])
->name('appointments');

Route::get('addAppointment/{id}',[HospitalLivewire::class,'addAppointment']);

//Hospital PDF Route
Route::get('pdf/previewHospitals', [PDFController::class, 'getAllHospitals'])->name('pdf.previewHospitals');
Route::get('pdf/generateHospitals', [PDFController::class, 'downloadHospitals'])->name('pdf.generateHospitals');

//User Appointment PDF Route
Route::get('pdf/previewUserAppointments', [PDFController::class, 'getUserAppointments'])->name('pdf.previewUserAppointments');
Route::get('pdf/generateUserAppointments', [PDFController::class, 'downloadUserAppointments'])->name('pdf.generateUserAppointments');

//Hospital Staff Appointment PDF Route
Route::get('pdf/previewHospStaffAppointment', [PDFController::class, 'getHospStaffAppointments'])->name('pdf.previewHospStaffAppointment');
Route::get('pdf/generateHospStaffAppointment', [PDFController::class, 'downloadHospStaffAppointments'])->name('pdf.generateHospStaffAppointment');

//Admin Appointment PDF Route
Route::get('pdf/previewAppointments', [PDFController::class, 'getAllAppointments'])->name('pdf.previewAppointments');
Route::get('pdf/generateAppointments', [PDFController::class, 'downloadAppointments'])->name('pdf.generateAppointments');

//Contact/feedback route
Route::get('contactform', ContactForm::class)
->middleware(['auth:sanctum', 'verified'])
->name('contactform');

//User PDF Route (ADMIN ONLY)
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('pdf/previewUsers', [PDFController::class, 'getAllUsers'])->name('pdf.previewUsers');
    Route::get('pdf/generateUsers', [PDFController::class, 'downloadUsers'])->name('pdf.generateUsers');
});

//Feedback PDF Route (ADMIN ONLY)
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('pdf/previewMessages', [PDFController::class, 'getAllFeedback'])->name('pdf.previewMessages');
    Route::get('pdf/generateMessages', [PDFController::class, 'downloadFeedback'])->name('pdf.generateMessages');
});


//calendar
Route::get('calendar', Calendar::class)
->middleware(['auth:sanctum', 'verified'])
->name('calendar');

//medical history
Route::get('med_histories', MedHistoryLivewire::class)
->middleware(['auth:sanctum', 'verified'])
->name('med_histories');

//maps
Route::get('maps', Maps::class)
->middleware(['auth:sanctum', 'verified'])
->name('maps');

////User Medical History PDF Route
Route::get('pdf/previewUserMedHistory', [PDFController::class, 'getUserMedHistory'])->name('pdf.previewUserMedHistory');
Route::get('pdf/generateUserMedHistory', [PDFController::class, 'downloadUserMedHistory'])->name('pdf.generateUserMedHistory');

////User Medical History PDF Route HOSPITAL STAFF
//Route::get('pdf/previewUserMedHistoryHS', [PDFController::class, 'getUserMedHistoryHS'])->name('pdf.previewUserMedHistoryHS');
//Route::get('pdf/generateUserMedHistoryHS', [PDFController::class, 'downloadUserMedHistoryHS'])->name('pdf.generateUserMedHistoryHS');

Route::get('pdf/generateUserMedHistoryHS', [AdminAppointment::class, 'downloadUserMedHistoryHS'])->name('pdf.generateUserMedHistoryHS');

//Personal info
Route::get('personal_infos', PersonalInfoLivewire::class)
->middleware(['auth:sanctum', 'verified'])
->name('personal_infos');

//User Info PDF Route
Route::get('pdf/previewUserInfo', [PDFController::class, 'getUserInfo'])->name('pdf.previewUserInfo');
Route::get('pdf/generateUserInfo', [PDFController::class, 'downloadUserInfo'])->name('pdf.generateUserInfo');
//Admin Get User Info PDF
Route::get('pdf/generateAllUserInfo', [PDFController::class, 'downloadAllUserInfo'])->name('pdf.generateAllUserInfo');
