<?php

use App\Models\Client;
use App\Models\Course;
use App\Models\Clientcourse;
use App\Models\Employee;
use App\Models\Sidebar;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

function getClientById($client_id=0){
    $client = Client::where('id', $client_id)->first();
    return $client;
}

function getCourseById($course_id=0){
    $course = Course::where('id', $course_id)->first();
    return $course;
}

function getusername($user_id=0){
    $user = User::where('id', $user_id)->first();
    return $user->first_name." ".$user->last_name;
}


function getclientname($user_id=0){
    $user = Client::where('id', $user_id)->first();
    return $user->name;
}

function getUserById($user_id=0){
    $course = User::where('id', $user_id)->first();
    return $course;
}


function getCountEmployees($client_id=0){
    return Employee::where('client_id', $client_id)->count();
}

function myauthtabs(){
    $user =  Auth::user();
    $user_type = $user->user_type;
    $authTabs = $user->accessTabs;
    if($user_type==0)   //Admin
      return 'all'; 
    else                //Consultant
        return $user->accessTabs;      
}

function getuserattendance($attend_date="", $user_id=0, $course_id=0){
    return Attendance::where(["attend_date"=>$attend_date, "course_id"=>$course_id, "user_id"=> $user_id])->get()->first();
}

function getCountEmployeesOfCourse($course_id = 0 ){
    return Employee::where(["course_id"=>$course_id])->count();
}

