<?php

namespace App\Http\Controllers;

use App\Models\Clientcourse;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class ClientcourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($client_id=0)
    {
        
        $courses = Clientcourse::where("client_id", $client_id)->get();
        return view("Clientcourse.clientCourses_list")->with(["courses"=>$courses, "client_id"=>$client_id]);
    }

    public function consultantattendance(){
        $courses = Clientcourse::where("consultant_id", auth()->user()->id)->get();
        return view("Clientcourse.clientCourses_list")->with(["courses"=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client_id)
    {
        $consultants = User::where('user_type', 2)->get();

        return view("Clientcourse.addClientCourse")->with(["consultants"=>$consultants, "client_id"=>$client_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        print_r($request->input());
        $validatedData = $request->validate([
            'course_name' => ['required'],
            'client_id' => ['required'],
            'courseId' => ['required', 'unique:courses'],
            'consultantId' => ['required'],
            'preassignment_link' => ['required'],
            'postassignment_link' => ['required'],
            'evolution' => ['required'],
            'start_date' => ['required'],
            'start_time' => ['required'],
            'end_date' => ['required'],
            'end_time' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'training_type' => ['required'],
            'notice' => ['required'],
        ]);
       
        $language_of_facilates =array();
        $language_of_material =array();
        $client_id = $request->client_id;
        echo $client_id;
        if(isset($request->facilates_arabic))
            $language_of_facilates[] = "arabic";
        if(isset($request->facilates_english))
            $language_of_facilates[] = "english";
        if(isset($request->facilates_both))
            $language_of_facilates = ["arabic", "english"];

        if(isset($request->material_arabic))
            $language_of_material[] = "arabic";
        if(isset($request->material_english))
            $language_of_material[] = "english";

        $data["name"] = $request->course_name;
        $data["courseId"] = $request->courseId;
        $data["client_id"] = $request->client_id;
        $data["consultant_id"] = $request->consultantId;
        $data["preassignment_link"] = $request->preassignment_link;
        $data["postassignment_link"] = $request->postassignment_link;
        $data["registration_link"] = $request->registration_link;
        $data["workshop_link"] = $request->workshop_link;
        $data["infosheet_link"] = $request->infosheet_link;
        $data["calender_link"] = $request->calender_link;
        $data["evolution"] = $request->evolution;
        $data["start_date"] = $request->start_date;
        $data["start_time"] = $request->start_time;
        $data["end_date"] = $request->end_date;
        $data["end_time"] = $request->end_time;
        $data["city"] = $request->city;
        $data["country"] = $request->country;
        $data["training_type"] = $request->training_type;
        $data["notice"] = $request->notice;
        $data["language_of_facilates"] = implode(',', $language_of_facilates);
        $data["language_of_material"] = implode(',', $language_of_material);
         
        $result = Clientcourse::create($data);
        $employee_email = $request->employee_email;
        
        if(isset($employee_email)&&!empty($employee_email))
            foreach($employee_email as $key => $employee_loop){
                $emp_data["firstname"] = $request->employee_firstname[$key];
                $emp_data["lastname"] = $request->employee_lastname[$key];
                $emp_data["email"] = $request->employee_email[$key];
                $emp_data["mobile"] = $request->employee_mobile[$key];
                $emp_data["gender"] = $request->employee_gender[$key];
                $emp_data["client_id"] = $client_id;
                $emp_data["course_id"] = $result->id;
                Employee::insert($emp_data);
            }
        if($result)
        return redirect()->route('clientcourses', $client_id)
            ->with('success','You have successfully added course.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientcourse  $clientcourse
     * @return \Illuminate\Http\Response
     */
    public function show(Clientcourse $clientcourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientcourse  $clientcourse
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientcourse $clientcourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientcourse  $clientcourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientcourse $clientcourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientcourse  $clientcourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId)
    {
        $result = Clientcourse::where("id", $courseId)->delete();
        if($result)
        return redirect()->back()
            ->with('success','You have successfully deleted course.');
    }
}
