<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'auth_level', 'banned', 'username', 'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reviews()
    {
        return $this->hasMany('App\Review', 'user_id', 'id')->orderBy('created_at', 'desc');
    }

    public function events()
    {
        return $this->hasMany('App\Event', 'user_id', 'id')->orderBy('created_at', 'desc');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile', 'user_id', 'id');
    }
}
