<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    protected $table = "additions";

    protected $fillable = [
        'owner_ar', 'owner_en', 'owner_image', 'taif_ar', 'taif_en', 'taif_image',
    ];

}
