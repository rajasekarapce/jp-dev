<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'qualification_id',
        'status',
        ];

    const STATUS_RADIO = [
        1 => 'Active',
        0 => 'Inactive',
    ];    
}
