<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Requests\StorePartner;
use App\Http\Requests\UpdatePartner;

class PartnerController extends Controller
{
    public function __construct(Partner $partner)
    {
        $this->model = $partner;
        $this->route = 'partners';
        $this->title = 'partners';

        $this->table_attributes = [
            'image' => 'image'
        ];


        $this->attributes = [

            'image' => 'image',
        ];


        $this->storeRequest = new StorePartner();
        $this->updateRequest = new UpdatePartner();

        parent::__construct();
    }
}
