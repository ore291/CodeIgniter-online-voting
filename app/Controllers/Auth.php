<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{

    // enabling features

    public function __construct()
    {
        helper(['url', 'form']);
    }



    public function index()
    {
        echo "login page";
    }


    // add new user
    public function registerUser()
    {
        $validated = $this->validate([
            'email' => 'required',
            'state' => 'required|valid_email',
            'category' => 'required',
            'occupation' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'password' => 'required|min_length[6]|max_length[20]',
            'gender' => 'required',
            'phone' => 'required|min_length[11]'
        ]);

        if(!$validated)
        {
            return view('sign_up', ['validation' => $this->validator]);
        }
    }
}
