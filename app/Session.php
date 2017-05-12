<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'description', 'user_id', 'ended_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
