<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientcourses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("courseid");
            $table->string("consultant_id");
            $table->string("preassignment_link");
            $table->string("postassignment_link");
            $table->string("registration_link");
            $table->string("workshop_link");
            $table->string("infosheet_link");
            $table->string("calender_link");
            $table->string("evolution");
            $table->date("start_date");
            $table->time("start_time");
            $table->date("end_date");
            $table->time("end_time");
            $table->string("city");
            $table->string("country");
            $table->string("training_type");
            $table->string("notice");
            $table->string("language_of_facilates");
            $table->string("language_of_material");
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
        Schema::dropIfExists('clientcourses');
    }
}
