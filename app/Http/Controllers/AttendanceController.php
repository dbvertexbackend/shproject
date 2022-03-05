<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use App\Models\Clientcourse;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_id=0)
    {
        
        // SELECT employees.*, attendances.attendance, attendances.attend_date FROM `employees` left join attendances on attendances.user_id=employees.id and attendances.attend_date='2022-02-23' where employees.course_id = 14;
        $course = Clientcourse::where("id", $course_id)->get()->first();
        $period = CarbonPeriod::create($course->start_date, (($course->end_date>=date("Y-m-d"))?date("Y-m-d"):$course->end_date));
        return view('Attendances.attendances_list')->with(["course"=>$course, "period"=>$period]);
    }

    public function getData(Request $request){
        $validatedData = $request->validate([
            'date' => ['required'],
            'course_id' => ['required'],
        ]);    
        $of_date = $request->date;
        $course_id = $request->course_id;
       
        $attendances = Employee::select("employees.*", "attendances.attendance", "attendances.attend_date")->where('employees.course_id', $course_id)->leftJoin('attendances', function($join)
        use ($of_date)  {   
            $join->on('attendances.user_id', '=', 'employees.id');
            $join->whereDate('attendances.attend_date', date("Y-m-d", strtotime($of_date)));
        })->get();
        
        return response($attendances, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($course_id=0, $user_id=0)
    {
        $course = Clientcourse::where("id", $course_id)->get()->first();
        $periods = CarbonPeriod::create($course->start_date, (($course->end_date>=date("Y-m-d"))?date("Y-m-d"):$course->end_date));
        $user = Employee::where("id", $user_id)->get()->first();
        return view("Attendances.alltendance_details")->with(["periods"=>$periods, "course"=>$course, "user"=> $user]);
    }

   

    public function deleteuserattendance(Request $req){
        $validatedData = $req->validate([
            'attend_date' => ['required'],
            'course_id' => ['required'],
            'user_id' => ['required'],
        ]); 
        return Attendance::where(["attend_date"=>$req->attend_date, "course_id"=>$req->course_id, "user_id"=> $req->user_id])->delete();
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => ['required'],
            'course_id' => ['required'],
            'attend_date' => ['required'],
            'attendance' => ['required'],
        ]);
        $attendance = Attendance::firstOrNew(['user_id' =>  request('user_id'), 'course_id' =>  request('course_id'), 'attend_date' =>  request('attend_date')]);
        $attendance->attendance = request('attendance');
        $attendance->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
