<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";

    protected $fillable = [
        'title_ar', 'title_en', 'image',
    ];

}
