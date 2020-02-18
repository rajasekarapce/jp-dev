<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'status',
        ];

    const STATUS_RADIO = [
        1 => 'Active',
        0 => 'Inactive',
    ];
}
