<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Course;
use App\Models\Clientcourse;
use App\Models\Mailtemplate;
use App\Models\Coursecronjob;
use Illuminate\Http\Request;
use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = auth()->user();
        if($auth_user->user_type==0){
            $upcoming_events = Clientcourse::where('start_date', '>', date("Y-m-d H:i:s"))->orderBy('id', 'DESC')->orderBy('id', 'DESC')->get();
            $inprogress_events = Clientcourse::where('start_date', '<', date("Y-m-d H:i:s"))->orderBy('id', 'DESC')->orderBy('id', 'DESC')->where('end_date', '>', date("Y-m-d H:i:s"))->get();
            $completed_events = Clientcourse::where('end_date', '<', date("Y-m-d H:i:s"))->orderBy('id', 'DESC')->orderBy('id', 'DESC')->get();
        }
        else{
            $upcoming_events = Clientcourse::where('start_date', '>', date("Y-m-d H:i:s"))->where('client_id', $auth_user->id)->orderBy('id', 'DESC')->get();
            $inprogress_events = Clientcourse::where('start_date', '<', date("Y-m-d H:i:s"))->where('end_date', '>', date("Y-m-d H:i:s"))->where('client_id', $auth_user->id)->orderBy('id', 'DESC')->get();
            $completed_events = Clientcourse::where('end_date', '<', date("Y-m-d H:i:s"))->where('client_id', $auth_user->id)->orderBy('id', 'DESC')->get();
        }
        return view("events.event_list")->with(["upcoming_events"=>$upcoming_events, "inprogress_events"=>$inprogress_events, "completed_events"=>$completed_events]);
    }

    public function inviteforevent($course_id=0){
        if($course_id==0)
        die();
        $course = Clientcourse::where('id', $course_id)->first();
        $course_client = getClientById($course->client_id);
        $course_consultant = getUserById($course->consultant_id);
        $course_employees = Employee::where('course_id', $course_id)->get();
        $invite_temp = Mailtemplate::where('name', 'invites')->first();
        $inviteTypes = Mailtemplate::select('id', 'name')->get();
        return view('events.inviteforevent', ["course"=>$course, "course_client"=>$course_client, "course_consultant"=>$course_consultant, "course_employees"=>$course_employees, "invite_temp"=>$invite_temp, "inviteTypes"=>$inviteTypes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client_id=0)
    {
        if($client_id!=0){
        $employess = Employee::all();
        $consultants = Employee::all();
        $courses = Course::all();
        return view("events.addEvent")->with(["client_id"=>$client_id, "employess"=>$employess, "consultants"=>$consultants, "courses"=>$courses]);
        }    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data["event_name"] = $request->event_name;
        $data["course_id"] = $request->course;
        $data["employees"] = $request->employees;
        $data["client_id"] = $request->client_id;
        $data["start_date"] = $request->start_date;
        $data["end_date"] = $request->end_date;
        $data["consulatant_id"] = $request->consultant;
        $result = Event::insert($data);
        if($result)
        return redirect()->route('events')
            ->with('success','You have successfully add event.');
    }

    public function sendinvitation(Request $req){
        $data["course_id"] = $req->course_id;
        $employees_str = $req->employees;
        $data["template_id"] = $req->template_id;
        $data["email_cc"] = $req->email_cc;
        $data["email_bcc"] = $req->email_bcc;
        $data["email_subject"] = $req->email_subject;
        $data["employees"] = Employee::whereRaw("FIND_IN_SET(id, $employees_str)")->get();
        echo Mailtemplate::sendMail($data);
        echo "Success";
    }

    public function createinvitation(Request $req){
        $template_id = $req->template_id;
        $course_id = $req->course_id;
        $template = Mailtemplate::CourseTemplate($template_id, $course_id);
        return response($template, 200)->header('Access-Control-Allow-Headers', '*');
    }


    public function edittemplate($template_id=0){
        if($template_id==0)
        return false;
        $template = Mailtemplate::where('id', $template_id)->first();
        return view('MailTemplate.Mailtemplatelist')->with(["template"=>$template]);
    }

    public function updatetemplate(Request $req){
        $template = $req->template;
        $temp_id = $req->template_id;
        if(Mailtemplate::where('id', $temp_id)->update(["template"=>$template])){
            $response["status"] = true;
            $response["message"] = "Update Success";
            return response($response, 200);
        }
        else{
            $response["status"] = false;
            $response["message"] = "Update Failed";
            return response($response, 200);
        }
    }

    public function scheduleMail(Request $req){
        $validated = $req->validate([
            'email_subject' => 'required',
            'email_employees' => 'required',
            'email_cc' => 'required',
            'email_bcc' => 'required',
            'email_body' => 'required',
            'schedule_time' => 'required',
            'course_id' => 'required',
        ]);

        $data["email_subject"] = $req->email_subject;
        $data["email_employees"] = $req->email_employees;
        $data["email_cc"] = $req->email_cc;
        $data["email_bcc"]= $req->email_bcc;
        $data["email_body"] = $req->email_body;
        $data["schedule_time"] = $req->schedule_time;
        $data["course_id"] = $req->course_id;
        $result = Coursecronjob::insert($data);
        
        if($result)
        return response(["status"=>true]);
        else
        return response(["status"=>false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($event_id=0)
    {
        $result = Event::where('id', $event_id)->delete();
        if($result)
        return redirect()->back()
            ->with('success','You have successfully deleted event.');
    }
}
