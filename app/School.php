<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
     protected $fillable = [
        'name', 'location'
    ];

    public function classes()
    {
        return $this->hasMany('App\SchoolClass');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

        public function events()
    {
        return $this->hasMany('App\Event');
    }
}
