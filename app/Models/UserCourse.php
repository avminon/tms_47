<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourse extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id', 'course_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByCourseIds($query, $ids)
    {
        return $query->whereIn('course_id', $ids);
    }
}
