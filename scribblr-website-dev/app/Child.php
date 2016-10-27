<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
        'childName', 'date_of_birth', 'gender', 'user_id'
    ];

    public function Quotes()
    {
        return $this->hasMany('App\Quote');
    }
}
