<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // Values that are "fillable" by user input
    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'avatar', 'school_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function class()
    {
        return $this->belongsTo('App\SchoolClass');
    }
}
