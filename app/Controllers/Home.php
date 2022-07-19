<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = ucfirst('Voting');

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

<<<<<<< HEAD

        return view('about', $data);}
    public function faqs()
    {
        $data['title'] = ucfirst('FAQS');


        return view('faqs', $data);
=======
        return view('about', $data);
>>>>>>> cd2853da6b61da06f8ed07b62661549e9cf32259
    }
    
}
