<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Clientcourse;
use App\Models\Employee;
use App\Models\Mailtemplate;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $courses = Clientcourse::whereDate('start_date', date('Y-m-d', strtotime(date('Y-m-d')." -1 day")))->get();
        foreach ($courses as $key => $course) {
            $employees = Employee::where('course_id', $course->id)->get();
            foreach ($employees as $key => $employee) {
                $data["course_id"] = $course->id;
                $data["template_id"] = 1;
                $data["email_cc"] = "example@example.com";
                $data["email_bcc"] = "example@example.com";
                $data["email_subject"] = "Course Reminder";
                $data["employees"] = $employees;
                echo Mailtemplate::sendMail($data);
            }
        }
        return 0;
    }
}
