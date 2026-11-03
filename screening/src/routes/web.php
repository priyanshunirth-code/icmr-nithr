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
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CronController;


Route::get('/dashboard', function () {return redirect('/dashboard');})->middleware('adminRole');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/send-result-mail', [CronController::class, 'send_result_mail'])->name('send_result_mail');
Route::get('/send-admitcard-mail', [CronController::class, 'send_admitcard_mail'])->name('send_admitcard_mail');

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

Route::get('/verification', [RegisterController::class, 'verification'])->name('mailVerification');
Route::post('/verifiy-otp', [RegisterController::class, 'verifiyOtp'])->name('verifiyOtp');
Route::get('/verifiy-otp-for-changepassword', [RegisterController::class, 'verifyForChangePass'])->name('verifyForChangePass');
Route::get('/resend-otp', [RegisterController::class, 'resendOtp'])->name('resendOtp');
Route::get('logoutt', [LoginController::class, 'logout'])->name('logoutt');

Route::get('/update-group-password', [CronController::class, 'updategrouppassword'])->name('updategrouppassword');

Route::get('/groups', [ApplicationController::class, 'groups'])->name('admin.groups');
Route::get('/update-assign-to', [ApplicationController::class, 'updateassignto'])->name('admin.updateassignto');
Route::get('/group-applicants', [ApplicationController::class, 'groupapplicants'])->name('admin.group.applicants');
Route::get('/admin-edit-screening', [ApplicationController::class, 'editscreening'])->name('admin.editscreening');
Route::post('/admin-save-screening', [ApplicationController::class, 'save_sorting'])->name('admin.savesorting');
Route::post('/admin-calculate-age-relaxation', [ApplicationController::class, 'calculate_age_relaxation'])->name('admin.calculateagerelaxation');
Route::get('/admin-process-screening-review', [ApplicationController::class, 'processshortingreview'])->name('admin.processshortingreview');
Route::get('/admin-save-final-screening', [ApplicationController::class, 'savefinalsorting'])->name('admin.savefinalsorting');
Route::get('/applications', [ApplicationController::class, 'applications'])->name('admin.applications');
Route::get('/export-excel', [ApplicationController::class, 'exportExcel'])->name('admin.exportExcel');
Route::get('/document-not-showing-applications', [ApplicationController::class, 'documentnotshowingapplications'])->name('admin.documentnotshowingapplications');
Route::get('/check-long-name-document-candidate', [ApplicationController::class, 'checklongnamedocumentcandidate'])->name('admin.checklongnamedocumentcandidate');
Route::get('/candidates', [ApplicationController::class, 'candidatelist'])->name('admin.candidatelist');

Route::get('/group-dashboard', [GroupController::class, 'groupdashboard'])->name('groupdashboard');
Route::get('/group-change-password', [GroupController::class, 'changepassword'])->name('group.changepassword');
Route::post('/group-update-password', [GroupController::class, 'updatepassword'])->name('group.updatepassword');
Route::get('/screening', [GroupController::class, 'shorting'])->name('group.shorting');
Route::get('/screening-list', [GroupController::class, 'slotshortinglist'])->name('group.slotshortinglist');
Route::get('/process-screening', [GroupController::class, 'processshorting'])->name('group.processshorting');
Route::post('/save-screening', [GroupController::class, 'save_sorting'])->name('group.savesorting');
Route::post('/calculate-age-relaxation', [GroupController::class, 'calculate_age_relaxation'])->name('group.calculateagerelaxation');
Route::get('/process-screening-review', [GroupController::class, 'processshortingreview'])->name('group.processshortingreview');
Route::get('/save-final-screening', [GroupController::class, 'savefinalsorting'])->name('group.savefinalsorting');
Route::get('/completed-screening', [GroupController::class, 'completedscreening'])->name('group.completedscreening');
Route::get('/edit-screening', [GroupController::class, 'editscreening'])->name('group.editscreening');
Route::get('/mark-all-screeing-complete', [GroupController::class, 'markallscreeingcomplete'])->name('group.markallscreeingcomplete');

Route::get('/changepassword', [ApplicationController::class, 'change_password'])->middleware('auth')->name('changepassword');
Route::post('/changepassword', [ApplicationController::class, 'update_password'])->middleware('auth')->name('change.password');

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
