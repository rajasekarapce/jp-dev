<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComptetiveExam extends Model
{
    protected $fillable = ['user_id', 'competitive_exam', 'score_type', 'score'];
}
