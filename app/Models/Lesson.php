<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table="Lessons";

//    public function course()
//    {
//        $this->hasOne('App\Models\Course', 'id', 'course_id');
//    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
