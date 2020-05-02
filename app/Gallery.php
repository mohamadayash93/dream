<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "galleries";

    protected $fillable = [
        'body_ar', 'body_en', 'image',
    ];

}
