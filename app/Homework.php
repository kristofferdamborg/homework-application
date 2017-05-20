<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = [ 
        'title', 'description', 'school_class_id', 'subject_id', 'subject_icon', 'subject_bg', 'started_at', 'due_at'
    ];
        public function class()
    {
        return $this->belongsTo('App\SchoolClass');
    }
        public function subject()
    {
        return $this->belongsTo('App\Subject');
        
    }
}
