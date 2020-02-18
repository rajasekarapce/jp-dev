<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = [
        'course',
        'status',
        'qual_type',
        'popular',
        ];

    const STATUS_RADIO = [
        1 => 'Active',
        0 => 'Inactive',
    ];

    const POPULAR_RADIO = [
        1 => 'Active',
        0 => 'Inactive',
    ];

    const TYPE_RADIO = [
        1 => 'Graduation Courses',
        2 => 'Post Graduation Courses',
        3 => 'Other Courses',
    ];    

}
