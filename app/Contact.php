<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'phone', 'mobile', 'email', 'address_en', 'address_ar', 'location',
        'face', 'youtube', 'linked_in', 'insta', 'twitter', 'snap'
    ];
}
