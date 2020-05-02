<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategory;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Requests\UpdateCategory;
use App\Category;

class CategoryController extends Controller
{
    public function __construct(Category $category)
    {
        $this->model = $category;
        $this->route = 'categories';
        $this->title = 'categories';

        $this->table_attributes = [
            "title" => "text",
            "products" => "text",
        ];

        $this->attributes = [
            "title_ar" => "text",
            "title_en" => "text",
            "image" => "image",
        ];

        $this->storeRequest = new StoreCategory();
        $this->updateRequest = new UpdateCategory();

        parent::__construct();
    }

}
