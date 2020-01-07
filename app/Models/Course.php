<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table="courses";

    public function lesson()
    {
        $this->hasMany('App\Models\Lesson','course_id', 'id');
    }
}
