<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ContestModel;
use App\Models\SponsorModel;
use App\Models\SettingsModel;

use App\Models\ContestantsModel;


class Home extends BaseController
{
    public function index()
    {
        $data['title'] = ucfirst('Home');


       

        $contest_model = new ContestModel();
        $sponsor_model = new SponsorModel();
        $user_model = new UserModel();
        $contestants_model= new ContestantsModel();


        $query = $contest_model->where("status", "pending")->orderBy('created_at', 'DESC')->findAll();
        $contests=$contest_model->where('winner_id IS NOT NULL',null,false )->orderBy('created_at','DESC')->findAll();

        foreach ($contests as &$contest) {
            $winner = $contestants_model->find($contest->winner_id);
            $winner->user = $user_model->find($winner->user_id);
            $contest->winner=$winner;
        }
        
       $data['contests_winners']=$contests;

        foreach ($query as &$contest) {
            $contest->sponsor = $sponsor_model
                ->where(['id' => $contest->sponsor_id])
                ->first();
        }
        unset($contestant);

        $data['contests'] = $query;
        

        return view('templates/main_header', $data) .
            view('home_page', $data) .
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
        return view('about', $data);  
    }



    public function faqs()
    {
        $data['title'] = ucfirst('FAQS');
        return view('faqs', $data);
        return view('about', $data);
    }
    public function forgot_password()
    {
        $data['title'] = ucfirst('Forgot Password');

        return view('forgot_password', $data); 
    }
    
}
