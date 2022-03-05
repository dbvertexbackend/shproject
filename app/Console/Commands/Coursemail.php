<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Coursecronjob;
use App\Models\Mailtemplate;

class Coursemail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coursemail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to send scheduled invitation, invitation and Thanks you mail scheduled at the time of send invitation.';

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
        \Log::info("Cron is working fine!");
        $cronjobs = Coursecronjob::where('schedule_time', date("Y-m-d H:i:00"));
        foreach ($cronjobs as $key => $cronjob) {
            if($cronjob->email_employees=="")
            continue;
            $employees = explode(',', $cronjob->email_employees);
            $course = Clientcourse::where('id', $cronjob->course_id)->first();
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
