<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Requests\StoreBlog;
use App\Http\Requests\UpdateBlog;


class BlogController extends Controller
{
    public function __construct(Blog $blog)
    {
        $this->model = $blog;
        $this->route = 'blogs';
        $this->title = 'blogs';

        $this->table_attributes = [
            'title' => 'text',
        ];


        $this->attributes = [
            'title_ar' => 'text',
            'title_en' => 'text',
            'body_ar' => 'textarea',
            'body_en' => 'textarea',
            'image' => 'image',
        ];


        $this->storeRequest = new StoreBlog();
        $this->updateRequest = new UpdateBlog();

        parent::__construct();
    }

}
