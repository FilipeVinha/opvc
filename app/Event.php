<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'user_id', 'occurrence_id', 'local_id', 'lat', 'lng', 'address', 'obs', 'created_at', 'id'
    ];

    protected $hidden = [
        'user_id', 'occurrence_id', 'local_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function occurrence()
    {
        return $this->hasOne('App\Occurrence', 'id', 'occurrence_id');
    }

    public function local()
    {
        return $this->hasOne('App\Local', 'id', 'local_id');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo', 'id', 'id');
    }
}
