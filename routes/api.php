<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EventController;
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

//Web Application API
Route::post('/getattendances', [AttendanceController::class, 'getData'])->name("getattendances");
Route::post('/attendance', [AttendanceController::class, 'update'])->name("attendanceapi");
Route::post('/deleteuserattendance', [AttendanceController::class, 'deleteuserattendance'])->name("deleteuserattendanceapi");
Route::post('/sendinvitationapi', [EventController::class, 'sendinvitation'])->name("sendinvitationapi");
Route::post('/createinvitationtemplate', [EventController::class, 'createinvitation'])->name("createinvitationtemplateapi");
Route::post('/updatetemplate', [EventController::class, 'updatetemplate'])->name("updatetemplateapi");
Route::post('/eventschedulemail', [EventController::class, 'scheduleMail'])->name("eventschedulemail");