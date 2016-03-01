<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSubject extends Model
{
    use SoftDeletes;
    protected $fillable = ['course_id', 'subject_id'];
    protected $dates = ['deleted_at'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
