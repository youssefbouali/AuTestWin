<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index(): string
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view("user_list", $data);
    }
    public function create() {
        return view('create_user');
    }
}