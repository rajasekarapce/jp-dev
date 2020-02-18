<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'name',
        'state_id',
        'status',
        ];

    const STATUS_RADIO = [
        1 => 'Active',
        0 => 'Inactive',
    ];  
}
