<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    protected $fillable = ['user_id', 'description', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeUserSubjectActivity($query, $userId, $subjectId)
    {
        return $query->where('user_id', $userId)
            ->where('subject_id', $subjectId);
    }
}
