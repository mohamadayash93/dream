<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController as Controller;
use App\Option;

class OptionController extends Controller
{
    public function __construct(Option $option)
    {
        $this->model = $option;
        $this->route = 'options';
        $this->title = 'options';

        $this->attributes = [
            "type" => "options",
            "text_ar" => "text",
            "text_en" => "text"
        ];

        parent::__construct();
    }
}
