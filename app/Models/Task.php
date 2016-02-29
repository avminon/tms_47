<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['description', 'subject_id'];

    const TASKS_PER_PAGE = 20;

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tasks', 'task_id', 'user_id');
    }

    public function userTasks()
    {
        return $this->hasMany(UserTask::class);
    }
}
