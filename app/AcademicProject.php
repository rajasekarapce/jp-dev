<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicProject extends Model
{
    protected $fillable = ['user_id', 'academic_projtype', 'academic_projname', 'academic_projdesc'];
}
