<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $fillable = [
        'name', 'user_id', 'piemel'
    ];

    public function quotes () {
        return $this->hasMany('App\Quote');
    }
}
