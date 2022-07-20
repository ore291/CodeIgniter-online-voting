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
        $request=service('request');
        $searchData= $this->request->getGet();
        $search="";
        $segment=0;
        if(isset($searchData)&&isset($searchData['search'])){
            $search=$searchData['search'];
        }

        if($search==''){
            $paginatedData=$contestModel->paginate(10);
        }else{
            $paginatedData= $contestModel->select('*')
            ->orLike('title',$search)
           
            ->paginate(10);

        }
        $data['contests'] = $contests;
        $data['contest']=$paginatedData;
        $data['pager']=$contestModel->pager;
        $data['search']=$search;

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
        // $sponsors = $sponsorModel->findAll();



        $searchData = $this->request->getGet();
        $search = "";
       
        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        if ($search == '') {
            $paginatedData = $sponsorModel->paginate(10);
        } else {
            $paginatedData = $sponsorModel->select('*')
                ->orLike('company_name', $search)
                ->orLike('name', $search)

                ->paginate(10);
        }



       
        $data['sponsors'] = $paginatedData;
        $data['pager'] = $sponsorModel->pager;
        $data['search'] = $search;
        // $data['sponsors'] = $sponsors;
        return view('admin/view_sponsors', $data);




    }
    public function getadd_category()
    {
        $data['title'] = ucfirst('admin');



        return view('admin/add_category', $data);
    }
    public function getview_votes(){
        $data['title'] = ucfirst('admin');
        $voteModel = new \App\Models\VoteModel();


        $searchData = $this->request->getGet();
        $search = "";

        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        if ($search == '') {
            $paginatedData = $voteModel->paginate(10);
        } else {
            $paginatedData = $voteModel->select('*')
                ->orLike('email', $search)
                ->orLike('name', $search)
                ->orLike('contestant_id', $search)
                ->orLike('reference', $search)

                ->paginate(10);
        }

        $data['votes'] = $paginatedData;
        $data['pager'] = $voteModel->pager;
        $data['search'] = $search;

        return view('admin/view_votes', $data);

    }


}
