<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessQuote extends Model
{
    public function theme()
    {
        return $this->belongsTo('App\Theme');
    }

    public function quote()
    {
        return $this->belongsTo('App\Quote');
    }
}
