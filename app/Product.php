<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'body_ar', 'body_en', 'image', 'category_id', 'price', 'is_new', 'offer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}
