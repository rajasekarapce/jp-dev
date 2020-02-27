<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    public function branchs(){
        
        return $this->hasMany(Branch::class);
        
    }
}
