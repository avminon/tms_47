<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    const SUBJECTS_PER_PAGE = 15;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
    ];

    public function course()
    {
        return $this->belongsToMany(
            Course::class,
            'course_subjects',
            'subject_id',
            'course_id'
        );
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_subjects',
            'subject_id',
            'user_id'
        );
    }
}
