<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubject extends Model
{
    const STATUS_START = 0;
    const STATUS_TRAINING = 1;
    const STATUS_FINISH = 2;

    protected $dates = ['end_date'];
    protected $fillable = ['user_id', 'subject_id', 'course_id', 'status', 'end_date'];
}
