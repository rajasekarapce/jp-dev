<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function qualification(){        
        return $this->belongsTo(Qualification::class);
    }
}
