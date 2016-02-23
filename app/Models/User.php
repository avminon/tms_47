<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'avatar'];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['deleted_at'];

    const TYPE_TRAINEE = 1;
    const TYPE_SUPERVISOR = 2;

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'user_tasks', 'user_id', 'task_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'user_subjects', 'user_id', 'subject_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_courses', 'user_id', 'course_id');
    }

    public function isSupervisor()
    {
        return ($this->type == self::TYPE_SUPERVISOR);
    }
}
