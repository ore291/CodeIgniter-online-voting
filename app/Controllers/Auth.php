<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Libraries\Utils;

class Auth extends BaseController
{
    // enabling features

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function getindex()
    {
        echo 'login page';
    }

    public function postlogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();

        $user = $userModel->where('email', $email)
            ->first();

        $checkPassword = Hash::check($password, $user->password);

        if (!$checkPassword) {
            session()->setFlashdata("fail", "incorrect password");
            return redirect()->back();
        } else {
            $userId = $user->id;
            session()->set('loggedInUser', $userId);
            session()->set('user', $user);
            if($user->role == 'admin'){
                return redirect()->to(base_url("admin"));
            }else{
            return redirect()->to("dashboard");}
        }
    }

    // public function uploadImage($image)
    // {
    //     $config['upload_path'] = getcwd() . '/images';
    //     $image_name = $image->getName();

    //     if (!is_dir($config['upload_path'])) {
    //         mkdir($config['upload_path'], 077);
    //     }

    //     if (!$image->hasMoved()) {
    //         $image->move($config['upload_path'], $image_name);
    //     }

    //     return $image_name;
    // }

    // add new user
    public function postRegister()
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
        $picture =  Utils::uploadImage($this->request->getFile('picture'));


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

        $check_email =  $userModel->where('email', $email)
            ->first();

        if ($check_email) {
            return redirect()->back()->with('fail', 'Email is already Registered');
        } {
            $query = $userModel->insert($data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to('/login')->with('success', 'Registration Successful');
            }
        }
    }
    public function getlogout()
    {
        session()->destroy();
        return redirect()->to("/");
    }
   
}
