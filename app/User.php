<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    // Values that are "fillable" by user input
    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'avatar', 'school_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function school_class()
    {
        return $this->belongsTo('App\SchoolClass');
    }

    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
}
