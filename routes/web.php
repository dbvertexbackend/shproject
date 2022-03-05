<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientcourseController;
use App\Http\Controllers\Dashbaord;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

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



Route::get('/', [Dashbaord::class, 'welcome'])->name('loginpage');

Route::post('/', [UserController::class, 'login'])->name('login');

//Dashboard
Route::get('/dashboard', [Dashbaord::class, 'index'])->name('dashboard')->middleware('auth');

//Users
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::get('/adduser', [UserController::class, 'create'])->name('adduser')->middleware('auth');
Route::post('/adduser', [UserController::class, 'store'])->middleware('auth');
Route::get('/deleteuser/{user_id}', [UserController::class, 'destroy'])->name('deleteuser')->middleware('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

//Clients
Route::get('/clients', [ClientController::class, 'index'])->name("clients")->middleware('auth');
Route::get('/addclient', [ClientController::class, 'create'])->name('addclient')->middleware('auth');
Route::post('/addclient', [ClientController::class, 'store'])->middleware('auth');
Route::get('/deleteclient/{client_id}', [ClientController::class, 'destroy'])->name('deleteclient')->middleware('auth');
Route::post('/isclientemailexists', [ClientController::class, 'isEmailExists'])->name('isclientemailexists')->middleware('auth');

//Courses
Route::get('/courses', [CourseController::class, 'index'])->name("courses")->middleware('auth');
Route::get('/addcourse', [CourseController::class, 'create'])->name('addcourse')->middleware('auth');
Route::post('/addcourse', [CourseController::class, 'store'])->middleware('auth');
Route::get('/deletecourse/{courseID}', [CourseController::class, 'destroy'])->name('deletecourse')->middleware('auth');

//Client Courses
Route::get('/clientcourses/{client_id}', [ClientcourseController::class, 'index'])->name("clientcourses")->middleware('auth');
Route::get('/addclientcourse/{client_id}', [ClientcourseController::class, 'create'])->name('addclientcourse')->middleware('auth');
Route::post('/addclientcourse', [ClientcourseController::class, 'store'])->name('addclientcoursepost')->middleware('auth');
Route::get('/deleteclientcourse/{courseID}', [ClientcourseController::class, 'destroy'])->name('deleteclientcourse')->middleware('auth');


//Attendance
Route::get('/attendances/{course_id}', [AttendanceController::class, 'index'])->name("attendances")->middleware('auth');
Route::get('/attendancedetails/{course_id}/{user_id}', [AttendanceController::class, 'show'])->name("attendancedetails")->middleware('auth');
Route::get('/addattendance', [AttendanceController::class, 'create'])->middleware('auth');
Route::post('/addattendance', [AttendanceController::class, 'store'])->middleware('auth');
Route::get('/consultantattendance', [ClientcourseController::class, 'consultantattendance'])->name('consultantattendance')->middleware('auth');

Route::post('/deleteclient', [ClientController::class, 'destroy'])->middleware('auth');


//Certificates
Route::get('/certificates', [CertificateController::class, 'index'])->name("certificates")->middleware('auth');
Route::get('/addcertificates', [CertificateController::class, 'create'])->name('addcertificates')->middleware('auth');
Route::post('/addcertificates', [CertificateController::class, 'store'])->middleware('auth');

//Events
Route::get('/events', [EventController::class, 'index'])->name("events")->middleware('auth');
Route::get('/addevent/{client_id}', [EventController::class, 'create'])->name('addevent')->middleware('auth');
Route::post('/addevent', [EventController::class, 'store'])->name('addeventpost')->middleware('auth');
Route::get('/deleteevent/{eventID}', [EventController::class, 'destroy'])->name('deleteevent')->middleware('auth');
Route::get('/inviteforevent/{eventID}', [EventController::class, 'inviteforevent'])->name('inviteforevent')->middleware('auth');
Route::get('/editinvitation/{invitationId}', [EventController::class, 'editinvitation'])->name('editinvitation')->middleware('auth');
Route::get('/edittemplate/{template_id}', [EventController::class, 'edittemplate'])->name("edittemplate")->middleware('auth');

//Employees 
Route::get('/employees/{client_id}', [EmployeeController::class, 'index'])->name("employees")->middleware('auth');
Route::get('/addemployee/{client_id}', [EmployeeController::class, 'create'])->name('addemployee')->middleware('auth');
Route::post('/addemployee', [EmployeeController::class, 'store'])->name('addemployeepost')->middleware('auth');
Route::get('/deleteemployee/{empid}/{client_id}', [EmployeeController::class, 'destroy'])->name('deleteemployee')->middleware('auth');
