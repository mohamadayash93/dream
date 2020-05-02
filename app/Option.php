<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type', 'code', 'text_ar', 'text_en'
    ];

}
