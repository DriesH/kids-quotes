<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'quote', 'child_id', 'backgr_with_quote', 'preset_background_id',
    ];
}
