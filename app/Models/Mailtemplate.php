<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientcourse;

class Mailtemplate extends Model
{
    use HasFactory;

    public static function CourseTemplate($template_id=0, $course_id=0)
    {
        $course = Clientcourse::where('id', $course_id)->first();
        $temp = Mailtemplate::where('id', $template_id)->first();
        $template = $temp->template;

        $fdate = date("d M, Y", strtotime($course->start_date));
        $tdate = date("d M, Y", strtotime($course->end_date));
        $datetime1 = new \DateTime($fdate);
        $datetime2 = new \DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days_interval = $interval->format('%a');
        $days_interval = ($days_interval==1)?"$days_interval day":"$days_interval days";
        $timing = date("h:i a", strtotime($course->start_time))." - ".date("h:i a", strtotime($course->end_time));

        $template = str_replace('__COURSEDURATION__', $days_interval, $template); 
        $template = str_replace('__STARTDATE_', $fdate, $template); 
        $template = str_replace('__ENDDATE__', $tdate, $template); 
        $template = str_replace('__TIMING__', $timing, $template); 
        $template = str_replace('__LANGUAGEOFMATERIAL__', $course->language_of_material, $template); 
        $template = str_replace('__LANGUAGEOFFACILITATION_', $course->language_of_facilates, $template); 
        $template = str_replace('__TYPEOFCLASS__', $course->training_type, $template); 
        $template = str_replace('__LOCATION__', $course->city, $template); 
        $template = str_replace('__COURSENAME__', $course->name, $template);
        $template = str_replace('__REGISTRATIONLINK__', '<a hrerf="'.$course->calender_link.'">'.$course->registration_link.'</a>', $template);
        $template = str_replace('__WORKSHOPLINK__', '<a hrerf="'.$course->calender_link.'">'.$course->workshop_link.'</a>', $template);
        $template = str_replace('__INFOSHEETLINK__', '<a hrerf="'.$course->calender_link.'">'.$course->infosheet_link.'</a>', $template);
        $template = str_replace('__CALENDERLINK__', '<a hrerf="'.$course->calender_link.'">'.$course->calender_link.'</a>', $template);
        $template = str_replace('__INSTRUCTOR__', getusername($course->consultant_id), $template);
        return $template;
    }

    public static function sendMail($data){
        $employees = $data["employees"];
        $course_id = $data["course_id"];
        $course = Clientcourse::where('id', $course_id)->first();
        $fdate = date("d M, Y", strtotime($course->start_date));
        $tdate = date("d M, Y", strtotime($course->end_date));
        $datetime1 = new \DateTime($fdate);
        $datetime2 = new \DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days_interval = $interval->format('%a');
        $days_interval = ($days_interval==1)?"$days_interval day":"$days_interval days";

        $consultant = getUserById($course->consultant_id);
        $instructor = $consultant?($consultant->first_name." ".$consultant->last_name):'';
        $details = [
            "course_id"=> $data["course_id"],
            "template_id"=> $data["template_id"],
            "email_cc"=> $data["email_cc"],
            "email_bcc"=> $data["email_bcc"],
            "title"=> $data["email_subject"],
            "course_name"=> $course->name,
            "training_type"=> $course->training_type,
            "registration_link"=> $course->registration_link,
            "course_duration"=> $days_interval,
            "start_date"=> $course->start_date,
            "end_date"=> $course->end_date,
            "start_time"=> $course->start_time,
            "end_time"=> $course->end_date,
            "instructor_name"=> $instructor,
            "language_of_material"=> $course->language_of_material,
            "language_of_facilitation"=> $course->language_of_facilates,
            "class_type"=> $course->training_type,  //virtual/classroom
            "location"=> $course->city.", ".$course->country,
            "workshop_link"=> $course->workshop_link,
            "infosheet_link"=> $course->infosheet_link,
            "zoom_link"=> $course->preassignment_link,
            "joining_link"=> "about::blank"
        ];

        foreach ($employees as $key => $employee) {
         
         $details["employee_name"] =  $employee->firstname." ".$employee->lastname;

         \Mail::to($employee->email)
                    ->cc($data["email_cc"])
                    ->bcc($data["email_bcc"])->send(new \App\Mail\InviteMail($details));
        }
            if (\Mail::failures()) {
                return \Mail::failures();
                // return response showing failed emails
            }
            else{
                return true;
            }
    }
}
