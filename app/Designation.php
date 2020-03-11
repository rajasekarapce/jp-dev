<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public function states(){
        return $this->hasMany(State::class);

        
    }
}
