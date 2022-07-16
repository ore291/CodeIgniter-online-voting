<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;

class Auth extends BaseController
{
    // enabling features

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        echo 'login page';
    }

    // add new user
    public function registerUser()
    {
        $firstName = $this->request->getPost('firstName');
        $lastName = $this->request->getPost('lastName');
        $full_name = $firstName . ' ' . $lastName;
        $email = $this->request->getPost('email');
        $state = $this->request->getPost('state');
        $occupation = $this->request->getPost('occupation');
        $gender = $this->request->getPost('gender');
        $password = $this->request->getPost('password');
        $phone = $this->request->getPost('phone');
        $category = $this->request->getPost('category');
        $picture = 'https://via.placeholder.com/150';
        
        
        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'full_name' => $full_name,
            'email' => $email,
            'gender' => $gender,
            'occupation' => $occupation,
            'picture' => $picture,
            'category' => $category,
            'phone' => $phone,
            'state' => $state,
            'password' => Hash::encrypt($password),
        ];

        $userModel = new \App\Models\UserModel();
        $query = $userModel->insert($data);

        if (!$query) 
        {
            return redirect()->back()->with('fail', 'Registration Failed');
        }
        else
        {
            return redirect()->back()->with('success', 'Registration Successful');
        }
    }
}
