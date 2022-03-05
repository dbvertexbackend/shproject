<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientcourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_id',
        'courseId',
        'consultant_id',
        'preassignment_link',
        'postassignment_link',
        'registration_link',
        'workshop_link',
        'infosheet_link',
        'calender_link',
        'evolution',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'city',
        'country',
        'training_type',
        'notice',
        'language_of_facilates',
        'language_of_material'
    ];
    

}
