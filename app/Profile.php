<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'contact', 'address', 'postalcode', 'city', 'photo', 'lat', 'lon'
    ];
}
