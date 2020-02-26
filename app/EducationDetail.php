<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    protected $fillable = ['user_id','hq_qualid', 'hq_passmonth', 'hq_passyear', 'hq_marktype', 'hq_mark', 'hq_state', 'hq_institute', 'hq_university', 'xii_passmonth', 'xii_passyear', 'xii_marktype', 'xii_mark', 'xii_school', 'xii_board', 'x_passmonth', 'x_passyear', 'x_marktype', 'x_mark', 'x_school', 'x_board'];

    const MARK_TYPE_RADIO = [
        1 => 'Percentage',
        2 => 'CGPA',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hqualification(){
        return $this->belongsTo(Qualification::class, 'hq_qualid');
    }

    public function hqstate(){
        return $this->belongsTo(State::class, 'hq_state');
    }

    public function hqinstitute(){
        return $this->belongsTo(Institute::class, 'hq_institute');
    }
    public function hquniversity(){
        return $this->belongsTo(Institute::class, 'hq_university');
    }  
}
