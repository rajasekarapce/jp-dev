<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{

    // protected $guarded = [];
    // public $timestamps = false;

    // public function state(){
        
    //     return $this->belongsTo(State::class);
    // }


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
