<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class API extends Model
{

    protected $table = 'API';
    protected $fillable = [
        'token', 'created_at', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
