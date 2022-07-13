<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
         $data['title'] = ucfirst('Voting');


        return view('templates/main_header',$data)
            . view('home_page')
            .view('templates/footer');
    }
}
