<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresetBackground extends Model
{
    protected $fillable = [
        'background_name', 'background_filename',
    ]
}
