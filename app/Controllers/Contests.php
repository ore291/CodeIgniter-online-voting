<?php

namespace App\Controllers;

class Contests extends BaseController
{
    public function index()
    {

        $data['title'] = ucfirst('Contests');


        return view('templates/header', $data)
            . view('contests')
            . view('templates/footer');
    }

    public function contest($title)
    {

        $data['title'] = ucfirst('Contests');
        $data['contest'] = $title;

        return view('templates/header', $data)
            . view('contest', $data)
            . view('templates/footer');
    }

    public function contestant($title,$name)
    {

        $data['title'] = ucfirst('Contests');
        $data['contest'] = $title;
        $data['name'] = $name;
        
      

        return view('templates/header', $data)
            . view('contestant_profile', $data)
            . view('templates/footer');
    }
}
