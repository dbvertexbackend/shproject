<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Course;
use App\Models\Certificate;
use Auth;

class Dashbaord extends Controller
{
    public function index(){
        $data["total_users"] = User::count()-1;
        $data["total_clients"] = Client::count();
        $data["total_employees"] = Employee::count();
        $data["total_courses"] = Course::count();
        $data["total_certificates"] = Certificate::count();
        return view("dashboard/home")->with($data);
    }

    public function welcome(){
        if(!Auth::user()){
            return view("welcome");
        }
        else{
            return redirect()->route('dashboard');
        }
    }
}
