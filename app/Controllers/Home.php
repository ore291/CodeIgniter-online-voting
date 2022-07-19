<?php

namespace App\Controllers;
use App\Models\UserModel;


class Home extends BaseController
{
    public function index()
    {
        $data['title'] = ucfirst('Voting');

        
        $userModel = new UserModel();


        $loggedInUser = session()->get("loggedInUser");

        $user = $userModel->find($loggedInUser);

        $data['user'] = $user;


        return view('templates/main_header', $data) .
            view('home_page') .
            view('templates/footer');
    }
    public function login()
    {
        $data['title'] = ucfirst('login');

        return view('login', $data);
    }
    public function signUp()
    {
        $categoryModel = new \App\Models\CategoryModel();
        $categories = $categoryModel->findAll();

        $data['title'] = ucfirst('Sign-up');
        $data['categories'] = $categories;

        return view('sign_up', $data);
    }
    public function contact()
    {
        $data['title'] = ucfirst('contact');

        return view('contact', $data);
    }
    public function about()
    {
   

        $data['title'] = ucfirst('about');


        return view('about', $data);}
    public function faqs()
    {
        $data['title'] = ucfirst('FAQS');


        return view('faqs', $data);
        return view('about', $data);
    }
    
}
