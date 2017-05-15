<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'school_id', 'user_id', 'icon_path', 'bg_color'
    ];

    public function school()
    {
        $this->belongsTo('App\School');
    }
        public function homework()
    {
       return $this->belongsToMany('App\Homework');
    }
}
