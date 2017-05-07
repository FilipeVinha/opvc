<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'id', 'created_at', 'review', 'event_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function event()
    {
        return $this->hasOne('App\Event', 'id', 'event_id');
    }
}
