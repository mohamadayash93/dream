<?php

namespace App\Http\Controllers;


use App\Http\Controllers\AdminController as Controller;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Product;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->model = $product;
        $this->route = 'products';
        $this->title = 'products';

        $this->table_attributes = [
            'title' => 'text',
            'category' => 'text',
        ];


        $this->attributes = [
            'title_ar' => 'text',
            'title_en' => 'text',
            'body_ar' => 'textarea',
            'body_en' => 'textarea',
            'price' => 'text',
            'is_new' => 'options',
            'offer' => 'text',
            'image' => 'image',
            'category_id' => 'select',
        ];



        $this->storeRequest = new StoreProduct();
        $this->updateRequest = new UpdateProduct();

        parent::__construct();
    }

}
