<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $fillable = ['first_name', 'last_name', 'grade_level', 'section'];
    protected $dates = ['created_at', 'updated_at'];
}
