<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'body_ar', 'body_en', 'image',
    ];

}
