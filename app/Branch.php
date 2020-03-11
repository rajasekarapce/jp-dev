<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    // protected $guarded = [];
    // public $timestamps = false;

    // public function qualification(){        
    //     return $this->belongsTo(Qualification::class);
    // }

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
