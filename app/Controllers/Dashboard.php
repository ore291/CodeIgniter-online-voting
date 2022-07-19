<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function getindex()
    {
        $data['title'] = ucfirst('dashboard');

        return view('dashboard', $data);

        // $userModel = new UserModel();


        // $loggedInUser = session()->get("loggedInUser");

        // $user = $userModel->find($loggedInUser);

        // $data['user'] = $user;

        // if ($loggedInUser) {
        //     return view('dashboard', $data);
        // } else {
        //     return redirect()->to("/login");
        // }
    }
}
