<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = [
        'title_ar', 'title_en' , 'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
