<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PaymentresponseController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\AttendanceController;

Route::get('/send-result-mail', [CronController::class, 'send_result_mail'])->name('send_result_mail');

Route::get('/dashboard', function () {return redirect('/dashboard');})->middleware('adminRole');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/provisional-application-status-list', [RegisterController::class, 'provisionalapplicationstatuslist'])->name('provisionalapplicationstatuslist');
Route::get('/error-page', function(){
    return view('errorPpage');
} )->name('ErrorPage');
Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
Route::get('/', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/registration', [RegistrationController::class, 'registration'])->middleware('studentRole')->name('registration');
Route::get('/applyfor/{id}', [RegistrationController::class, 'applyFor'])->name('applyfor');
Route::get('/get-city-name', [RegistrationController::class, 'getCityNameFunc'])->name('getCityName');

//crone-job
Route::get('/check-pending-payment-status-and-update-status-send-mail', [CronController::class, 'check_pending_payment_status_and_update_status_send_mail']);
Route::get('/crone-downloadapplicationpdf', [CronController::class, 'downloadapplicationpdf']);

Route::get('/studentReg', [StudentController::class, 'studentReg']);
Route::get('/verification', [RegisterController::class, 'verification'])->name('mailVerification');
Route::post('/verifiy-otp', [RegisterController::class, 'verifiyOtp'])->name('verifiyOtp');
Route::get('/verifiy-otp-for-changepassword', [RegisterController::class, 'verifyForChangePass'])->name('verifyForChangePass');
Route::get('/resend-otp', [RegisterController::class, 'resendOtp'])->name('resendOtp');
Route::post('/student-form-save', [StudentController::class, 'studentFormSave'])->middleware('studentRole');
Route::post('/student-form-update', [StudentController::class, 'studentFormUpdate'])->middleware('studentRole')->name('studentFormUpdate');
Route::get('/edit-form', [StudentController::class, 'stuEditForm'])->middleware('studentRole')->name('stuEditForm');
Route::get('/student-doc-upload', [StudentController::class, 'studentDocUpload'])->middleware('studentRole')->name('studentDocsUpload');
Route::post('/student-doc-save', [StudentController::class, 'studentDocsSave'])->middleware('studentRole')->name('studentDocsSave');
Route::get('/student-form-preview', [StudentController::class, 'studentFormPreviewFunc'])->middleware('studentRole')->name('studentFormPreview');
Route::get('/apply-form', [StudentController::class, 'applyForm'])->middleware('studentRole')->name('stuAppyForm');
Route::get('/form-submit-and-pay', [StudentController::class, 'formsubmitandpay'])->middleware('studentRole')->name('formsubmitandpay');
Route::get('/form-final-submit', [StudentController::class, 'formsubmitandwithoutpay'])->middleware('studentRole')->name('formsubmitandwithoutpay');
Route::post('/payment-response', [PaymentresponseController::class, 'paymentresponse'])->name('paymentresponse');
Route::get('/print-application', [PaymentresponseController::class, 'printapplication'])->name('printapplication');
Route::get('/print-admit-card', [StudentController::class, 'printAdmitCard'])->name('printAdmitCard');
Route::get('/download-application', [PaymentresponseController::class, 'downloadapplication'])->name('downloadapplication');
Route::get('/raise-concern', [StudentController::class, 'raiseconcern'])->middleware('studentRole')->name('raiseconcern');
Route::post('/save-raise-concern', [StudentController::class, 'saveraiseconcern'])->middleware('studentRole')->name('saveraiseconcern');
Route::post('/update-raise-concern', [StudentController::class, 'updateraiseconcern'])->middleware('studentRole')->name('updateraiseconcern');
// Route::post('/payment-response', [StudentController::class, 'paymentresponse'])->middleware('studentRole')->name('paymentresponse');
Route::get('logoutt', [LoginController::class, 'logout'])->name('logoutt');

Route::get('/applications', [ApplicationController::class, 'jobapplications'])->name('admin.applications');
Route::get('/pending-payment-applications', [ApplicationController::class, 'pendingpaymentjobapplications'])->name('admin.pendingpaymentapplications');
Route::get('/check-payment-status', [ApplicationController::class, 'checkpaymentstatus'])->name('admin.checkpaymentstatus');
Route::get('/update-payment-status', [ApplicationController::class, 'updatepaymentstatus'])->name('admin.updatepaymentstatus');
Route::get('/send-failed-status-mail', [ApplicationController::class, 'sendfailedstatusmail'])->name('admin.sendfailedstatusmail');
Route::get('/download-application-pdf', [ApplicationController::class, 'downloadapplicationpdf'])->name('admin.downloadapplicationpdf');
Route::get('/short-completed-application-document', [ApplicationController::class, 'short_completed_application_document'])->name('admin.short_completed_application_document');

Route::get('/attendance-sheet', [AttendanceController::class, 'attendance_sheet'])->name('admin.attendance_sheet');
Route::post('/generate-attendance-sheet', [AttendanceController::class, 'generate_attendance_sheet'])->name('admin.generate_attendance_sheet');
Route::get('/get-exam-center-date-time', [AttendanceController::class, 'get_exam_center_date_time'])->name('admin.get_exam_center_date_time');
Route::get('/get-exam-center-date-time-post', [AttendanceController::class, 'get_exam_center_date_time_post'])->name('admin.get_exam_center_date_time_post');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::group(['middleware' => 'studentRole'], function () {

// });
