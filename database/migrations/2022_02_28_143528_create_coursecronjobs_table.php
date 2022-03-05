<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursecronjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursecronjobs', function (Blueprint $table) {
            $table->id();
            $table->string("email_subject");
            $table->longText("email_employees");
            $table->string("email_cc");
            $table->string("email_bcc");
            $table->longText("email_body");
            $table->datetime("schedule_time");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursecronjobs');
    }
}
