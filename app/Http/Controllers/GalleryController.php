<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreGallery;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Requests\UpdateGallery;
use App\Gallery;

class GalleryController extends Controller
{
    public function __construct(Gallery $gallery)
    {
        $this->model = $gallery;
        $this->route = 'galleries';
        $this->title = 'galleries';

        $this->table_attributes = [
            "body" => "text",

        ];

        $this->attributes = [
            "body_ar" => "textarea",
            "body_en" => "textarea",
            "image" => "image"
        ];

        $this->storeRequest = new StoreGallery();
        $this->updateRequest = new UpdateGallery();

        parent::__construct();
    }

}
