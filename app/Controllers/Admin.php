<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function getindex()
    {$data['title']= ucfirst('admin');
        return view('admin/dashboard', $data);
    }

    public function getview_contest()
    {
        $data['title'] = ucfirst('admin');
        $contestModel = new \App\Models\ContestModel();
        $contests = $contestModel->findAll();
        $data['contests'] = $contests;

        return view('admin/view_contests', $data);
    }
    public function getadd_Contest()
    {
        $data['title'] = ucfirst('admin');
        $categoryModel = new \App\Models\CategoryModel();
        $categories = $categoryModel->findAll();
        $data['categories'] = $categories;


        return view('admin/add_contests', $data);
    }
    public function getadd_Sponsors()
    {
        $data['title'] = ucfirst('admin');
      


        return view('admin/add_sponsors', $data);
    }
    public function getSponsors()
    {
        $data['title'] = ucfirst('admin');
        $sponsorModel = new \App\Models\SponsorModel();
        $sponsors = $sponsorModel->findAll();
        $data['sponsors'] = $sponsors;
        return view('admin/view_sponsors', $data);
    }
}
