<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreOffer;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Requests\UpdateOffer;
use App\Offer;

class OfferController extends Controller
{
    public function __construct(Offer $offer)
    {
        $this->model = $offer;
        $this->route = 'offers';
        $this->title = 'offers';

        $this->table_attributes = [
            "title" => "text",

        ];

        $this->attributes = [
            "title_ar" => "text",
            "title_en" => "text",
            "image" => "image"
        ];

        $this->storeRequest = new StoreOffer();
        $this->updateRequest = new UpdateOffer();

        parent::__construct();
    }

}
