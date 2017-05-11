<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'school_id', 'user_id'
    ];

    public function school()
    {
        $this->belongsTo('App\School');
    }
}
