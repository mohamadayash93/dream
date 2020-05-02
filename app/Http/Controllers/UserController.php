<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use App\Http\Controllers\AdminController as Controller;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
        $this->route = 'users';
        $this->title = 'users';

        $this->table_attributes = [
            "name" => "text",
            "email" => "email",
            "mobile" => "text",
            "role" => "options",
        ];

        $this->attributes = [
            "name" => "text",
            "email" => "email",
            "mobile" => "text",
            "image" => "image",
            "role" => "options",
        ];


        $this->storeRequest = new StoreUser();
        $this->updateRequest = new UpdateUser();

        parent::__construct();
    }

}
