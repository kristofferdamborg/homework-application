<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = [ 
        'name', 'type', 'description', 'start_time', 'end_time', 'school_id', 'school_class_id'
    ];
        public function class()
    {
        return $this->belongsTo('App\SchoolClass')->withPivot('name');
    }
        public function school()
    {
        return $this->belongsTo('App\School');
        
    }
}
