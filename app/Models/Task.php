<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    const TASKS_PER_PAGE = 15;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['description', 'subject_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_tasks',
            'task_id',
            'user_id'
        );
    }

    public function userTasks()
    {
        return $this->hasMany(UserTask::class);
    }
}
