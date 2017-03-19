<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locals';

    protected $fillable = [
        'id', 'local'
    ];
}
