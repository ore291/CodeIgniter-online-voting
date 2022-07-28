<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Utils;
use App\Models\ContestModel;
use App\Models\CategoryModel;
use App\Models\SponsorModel;

class Contests extends BaseController
{
    public function getindex()
    {

        $contest_model = new ContestModel();

        $searchData = $this->request->getGet();

        $search = "";
        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        if ($search == '') {
            $paginateData = $contest_model->orderBy('created_at','DESC')->paginate(12);
        } else {
            $paginateData = $contest_model->select('*')
                ->orLike('title', $search)
               
                ->paginate(8);
        }

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

       

       

        $data = [
            'contests' => $paginateData,
            'pager' => $contest_model->pager,
            'search' => $search,
            'categories' => $categories,
            'title' => ucfirst('Contests')
          ];



        return view('contests',  $data);
    }

    // public function getcontest($id)
    // {

    //     $data['title'] = ucfirst('Contests');
    //     $data['contest'] = $id;

    //     return view('templates/header', $data)
    //         . view('contest', $data)
    //         . view('templates/footer');
    // }

    // public function contestant($title,$name)
    // {

    //     $data['title'] = ucfirst('Contests');
    //     $data['contest'] = $title;
    //     $data['name'] = $name;



    //     return view('templates/header', $data)
    //         . view('contestant_profile', $data)
    //         . view('templates/footer');
    // }

    public function postcreate()
    {
        $title = $this->request->getPost('title');
        $category = $this->request->getPost('category');
        $sponsor='';
        if ($this->request->getPost('sponsor') != 0)  {
            $sponsor = $this->request->getPost('sponsor');
        } else {
            $sponsor = null;
        }
        $price_per_vote = $this->request->getPost('price');
        $cover =  Utils::uploadImage($this->request->getFile('cover'));
        $picture = Utils::uploadImage($this->request->getFile('picture'));
        $slug = Utils::slugify($title);
        $start_date = $this->request->getPost('startDate');
        $end_date = $this->request->getPost('endDate');
       



        $data = [
            'title' => strtoupper($title),
            'category' => $category,
            'sponsor_id' => $sponsor,
            'price_per_vote' => $price_per_vote,
            'cover' => $cover,
            'picture' => $picture,
            'slug' => $slug,
            'start_date' => $start_date,
            'end_date' => $end_date

        ];

        $contest_model = new ContestModel();

        $query = $contest_model->insert($data);

        if (!$query) {
            return redirect()->back()->with('fail', 'Contest Creation Failed');
        } else {
            return redirect()->to('/admin/view-contest')->with('success', 'Registration Successful');
        }
    }
}
