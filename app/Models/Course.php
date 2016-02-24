<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'status'];
    protected $dates = ['deleted_at'];

    const STATUS_START = 1;
    const STATUS_TRAINING = 2;
    const STATUS_FINISHED = 3;
    const COURSES_PER_PAGE = 20;
    const MEMBERS_PER_PAGE = 10;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'user_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subjects', 'course_id', 'subject_id');
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_START => trans('courses.status_start'),
            self::STATUS_TRAINING => trans('courses.status_training'),
            self::STATUS_FINISHED => trans('courses.status_finished'),
        ];
    }

    public function getTraineesNotInCourse()
    {
        $courseUsers = $this->users()->trainees()->lists('user_id');
        return User::whereNotIn('id', $courseUsers)->trainees();
    }

    public function getSupervisorsNotInCourse()
    {
        $courseUsers = $this->users()->supervisors()->lists('user_id');
        return User::whereNotIn('id', $courseUsers)->supervisors();
    }
}
