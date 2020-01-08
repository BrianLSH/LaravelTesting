<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table="courses";

    public function profession(){
        return $this->belongsTo(Profession::class,'profession_id', 'id');
    }
}
