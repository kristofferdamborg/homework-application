<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'name', 'school_id'
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

        public function homeworks()
    {
        return $this->hasMany('App\Homework');
    }

        public function events()
    {
        return $this->hasMany('App\event');
    }
}
