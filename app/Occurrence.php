<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{
    protected $table = 'occurrences';

    protected $fillable = [
        'id', 'occurrence', 'category_id'
    ];

    protected $hidden = [
        'category_id'
    ];

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
