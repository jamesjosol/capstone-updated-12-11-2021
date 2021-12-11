<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\TempFilesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/about', [SiteController::class, 'about']);
Route::get('/dashboard', [SiteController::class, 'dashboard']);

Auth::routes();

Route::get('/verification/{user}/{token}', [EmailVerificationController::class, 'verification']);

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/students-detail-page', function () {
    return view('students-detail-page');
});

Route::get('/teachers', function () {
    return view('pages.admins.teachers');
});

Route::get('/section', function () {
    return view('pages.admins.section');
});

Route::get('/SchoolYear', function () {
    return view('pages.admins.SchoolYear');
});

Route::get('/payments', function () {
    return view('pages.users.payments');
});


Route::get('/EnrollSubjects', function () {
    return view('pages.admins.enroll-subjects');
});

Route::get('/dashboard-users', function () {
    return view('pages.users.users-dashboard');
});

Route::get('/dashboard-info', function () {
    return view('pages.users.users-dashboard-info');
});

Route::get('/dashboard-status-pending', function () {
    return view('pages.users.users-dashboard-status-pending');
});

Route::get('/dashboard-status-approved', function () {
    return view('pages.users.users-dashboard-status-approved');
});

Route::get('/dashboard-review-enroll', function () {
    return view('pages.users.review-enrollment');
});

Route::get('/enrolees', function () {
    return view('pages.admins.enrolees');
});

Route::get('/review-approve-student', function () {
    return view('pages.admins.view-enrolee');
});

Route::get('/approved-students', function () {
    return view('pages.admins.approved-enrolee');
});


Route::group(['middleware'=>'auth'], function() {
    
    Route::get('/temp/{path}', TempFilesController::class)->middleware('isFileOwner');
    Route::get('/files/{path}', FilesController::class)->middleware('isAdmin');
    Route::group(['prefix'=>'admin', 'middleware'=>'isAdmin'], function () {

        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('users', [AdminController::class, 'showUsers'])->name('admin.users');
        Route::post('users', [AdminController::class, 'storeUser'])->name('admin.users');
        Route::patch('users', [AdminController::class, 'updateUser'])->name('admin.users');
        Route::delete('users', [AdminController::class, 'deleteUser'])->name('admin.users');
        Route::get('users/view/{user}', [AdminController::class, 'viewUser'])->name('admin.users.view');

        Route::get('students', [AdminController::class, 'showStudents'])->name('admin.students');
        Route::get('students/create', [AdminController::class, 'createStudent'])->name('admin.students.create');
        Route::post('students/create', [AdminController::class, 'storeStudent'])->name('admin.students.create');
        Route::get('students/edit/{student}', [AdminController::class, 'editStudent'])->name('admin.students.edit');
        Route::patch('students/edit/{student}', [AdminController::class, 'updateStudent'])->name('admin.students.edit');
        Route::get('students/view/{student}', [AdminController::class, 'viewStudent'])->name('admin.students.view');
        Route::delete('students', [AdminController::class, 'deleteStudent'])->name('admin.students');

        Route::get('teachers', [AdminController::class, 'showTeachers'])->name('admin.teachers');
        Route::post('teachers', [AdminController::class, 'storeTeacher'])->name('admin.teachers');
        Route::patch('teachers', [AdminController::class, 'updateTeacher'])->name('admin.teachers');
        Route::delete('teachers', [AdminController::class, 'deleteTeacher'])->name('admin.teachers');

        Route::get('subjects', [AdminController::class, 'showSubjects'])->name('admin.subjects');
        Route::post('subjects', [AdminController::class, 'storeSubject'])->name('admin.subjects');
        Route::patch('subjects', [AdminController::class, 'updateSubject'])->name('admin.subjects');
        Route::delete('subjects', [AdminController::class, 'deleteSubject'])->name('admin.subjects');

        Route::get('sections', [AdminController::class, 'showSections'])->name('admin.sections');
        Route::post('sections', [AdminController::class, 'storeSection'])->name('admin.sections');
        Route::patch('sections', [AdminController::class, 'updateSection'])->name('admin.sections');
        Route::delete('sections', [AdminController::class, 'deleteSection'])->name('admin.sections');

        Route::get('classes', [AdminController::class, 'showClasses'])->name('admin.classes');
        Route::post('classes', [AdminController::class, 'storeClass'])->name('admin.classes');
        Route::patch('classes', [AdminController::class, 'updateClass'])->name('admin.classes');
        Route::delete('classes', [AdminController::class, 'deleteClass'])->name('admin.classes');

        Route::get('schoolyear', [AdminController::class, 'showSchoolYear'])->name('admin.schoolyear');
        Route::post('schoolyear', [AdminController::class, 'storeSchoolYear'])->name('admin.schoolyear');
        Route::patch('schoolyear', [AdminController::class, 'updateSchoolYear'])->name('admin.schoolyear');
        Route::delete('schoolyear', [AdminController::class, 'deleteSchoolYear'])->name('admin.schoolyear');

        Route::get('enrolees', [AdminController::class, 'showEnrolees'])->name('admin.enrolees');
        Route::get('enrolees/view/{enrolee}', [AdminController::class, 'viewEnrolee'])->name('admin.enrolees.view');
        Route::get('enrolees/set/{enrolee}', [AdminController::class, 'setApprovedEnrolee'])->name('admin.setenrolee');

    });
    
    Route::group(['prefix'=>'user', 'middleware'=>'isUser'], function () {
        Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::get('personalinfoform', [UserController::class, 'personalInfoForm'])->name('user.personalinfo');
        Route::post('personalinfoform', [UserController::class, 'personalInfoStore'])->name('user.personalinfo');
        Route::get('enrollment', [UserController::class, 'stepOneEnrollment'])->name('user.enrollment');
        Route::post('enrollment', [UserController::class, 'stepOneEnrollmentStore'])->name('user.enrollment.post');
        Route::delete('enrollment', [UserController::class, 'removeRequirementImage'])->name('user.enrollment.removeimage');

        Route::get('payments', [UserController::class, 'stepTwoEnrollment'])->name('user.payment');
        Route::post('payments', [UserController::class, 'stepTwoEnrollmentStore'])->name('user.payment.post');
        Route::delete('payments', [UserController::class, 'removePaymentImage'])->name('user.payment.removeimage');

        Route::get('review', [UserController::class, 'stepThreeEnrollment'])->name('user.review-enrollment');
        Route::post('review', [UserController::class, 'stepThreeEnrollmentStore'])->name('user.review-enrollment.post');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

