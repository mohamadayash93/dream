<?php

namespace App\Http\Controllers;

use App\Addition;
use App\Http\Requests\StoreAddition;
use App\Http\Requests\UpdateAddition;
use App\Http\Controllers\AdminController as Controller;
class AdditionController extends Controller
{
    public function __construct(Addition $addition)
    {
        $this->model = $addition;
        $this->route = 'additions';
        $this->title = 'additions';

        $this->table_attributes = [
            "owner" => "textarea",
            "taif" => "textarea",
        ];

        $this->attributes = [
            "owner_ar" => "textarea",
            "owner_en" => "textarea",
            "taif_ar" => "textarea",
            "taif_en" => "textarea",

        ];

        $this->storeRequest = new StoreAddition();
        $this->updateRequest = new UpdateAddition();

        parent::__construct();
    }

}
