<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = ['user_id', 'certification', 'cert_passmonth', 'cert_passyr'];
}
