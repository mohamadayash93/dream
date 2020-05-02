<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController as Controller;
use App\Http\Requests\StoreSlide;
use App\Http\Requests\UpdateSlide;
use App\Slide;

class SlideController extends Controller
{
    public function __construct(Slide $slide)
    {
        $this->model = $slide;
        $this->route = 'slides';
        $this->title = 'slides';

        $this->table_attributes = [
            'body' => 'text',
        ];


        $this->attributes = [

            'body_ar' => 'textarea',
            'body_en' => 'textarea',
            'image' => 'image',
        ];


        $this->storeRequest = new StoreSlide();
        $this->updateRequest = new UpdateSlide();

        parent::__construct();
    }

}
