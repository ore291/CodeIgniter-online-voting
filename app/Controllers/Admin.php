<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function getindex()
    {$data['title']= ucfirst('admin');
        return view('admin/dashboard', $data);
    }

    public function viewContest()
    {
        $data['title'] = ucfirst('admin');
        return view('admin/view_contests', $data);
    }
    public function addContest()
    {
        $data['title'] = ucfirst('admin');
        $categoryModel = new \App\Models\CategoryModel();
        $categories = $categoryModel->findAll();
        $data['categories'] = $categories;


        return view('admin/add_contests', $data);
    }
}
