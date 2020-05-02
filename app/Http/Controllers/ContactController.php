<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreContact;
use App\Http\Requests\UpdateContact;
use App\Http\Controllers\AdminController as Controller;

class ContactController extends Controller
{
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
        $this->route = 'contacts';
        $this->title = 'contacts';

        $this->table_attributes = [
            "phone" => "text",
            "mobile" => "text",
            "email" => "text",

        ];

        $this->attributes = [
            "phone" => "text",
            "mobile" => "text",
            "email" => "text",
            "address_ar" => "textarea",
            "address_en" => "textarea",
            "location" => "textarea",
            "face" => "text",
            "insta" => "text",
            "youtube" => "text",
            "linked_in" => "text",
            "twitter" => "text",
            "snap" => "text",
        ];

        $this->storeRequest = new StoreContact();
        $this->updateRequest = new UpdateContact();

        parent::__construct();
    }

}
