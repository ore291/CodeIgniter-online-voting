<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\GetContestants;


class Dashboard extends BaseController
{
    public function getindex()
    {
        $data['title'] = ucfirst('dashboard');

        $contestants_cl = new GetContestants();


        $user_id = session()->get("loggedInUser");


        $data['contestants'] = $contestants_cl->getUserContests($user_id);


        return view('dashboard', $data);

       
    }
}
