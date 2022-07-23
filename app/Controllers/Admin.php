<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ContestModel;
use App\Models\SponsorModel;
use App\Models\CategoryModel;
use Faker\Core\Number;

class Admin extends BaseController
{
    public function getindex()
    {   $data['title']= ucfirst('admin');

    $contestModel = new ContestModel();

        $orderData
        = $contestModel->select('*')->orderBy('id', 'DESC')->paginate(10);


        $data['contests']=$orderData;
       
        return view('admin/dashboard', $data);
       
    }
    public function uploadImage($image)
    {
        $config['upload_path'] = getcwd() . '/images';
        $image_name = $image->getName();

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 077);
        }

        if (!$image->hasMoved()) {
            $image->move($config['upload_path'], $image_name);
        }

        return $image_name;
    }

    public function getview_contest()
    {
        $data['title'] = ucfirst('admin');
        $contestModel = new ContestModel();
       
        $searchData= $this->request->getGet();
        $search="";

       
      
        if(isset($searchData)&&isset($searchData['search'])){
            $search=$searchData['search'];
        }

        if($search==''){
            $paginatedData= $contestModel->select('*')->orderBy('id', 'DESC')->paginate(10);
        }else{
            $paginatedData= $contestModel->select('*')
            ->orLike('title',$search)
            ->paginate(10);

        }
       
        $data['contests']=$paginatedData;
        $data['pager']=$contestModel->pager;
        $data['search']=$search;
       

        return view('admin/view_contests', $data);
    }




    public function getadd_Contest()
    {
        $data['title'] = ucfirst('admin');
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        $data['categories'] = $categories;


        return view('admin/add_contests', $data);
    }




    public function getadd_sponsors()
    {
        $data['title'] = ucfirst('admin');
        $sponsorModel = new SponsorModel();
        $sponsor = $sponsorModel->findAll();
        $data['sponsor'] = $sponsor;

      


        return view('admin/add_sponsors', $data);
    }






    public function getSponsors()
    {

        $data['title'] = ucfirst('admin');
        $sponsorModel = new SponsorModel();
        

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

        $sponsorModel->delete;

        function delete($id){
            $sponsorModel = new SponsorModel();

             $sponsorModel->delete($id);



        }


        $data['sponsors'] = $paginatedData;
        $data['pager'] = $sponsorModel->pager;
        $data['search'] = $search;
        
       
        return view('admin/view_sponsors', $data);




    }

    public function postSponsor()
    {
        $name=$this->request->getPost('sponsorName');
        $company=$this->request->getPost('company');
        $brand = $this->request->getPost('brand');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $Description = $this->request->getPost('companyDescription');

        $data=[
            'name'=>$name,
            'company_name'=> $company,
            'brand'=>$brand,
            'phone'=>$phone,
            'email'=>$email,
            'description'=>$Description
        ];
        $sponsorModel = new SponsorModel();

        $check_title =  $sponsorModel->where('name', $name)
            ->first();
            $check_mail=$sponsorModel->where('email',$email)->first();

        if ($check_title || $check_mail ) {
            return redirect()->back()->with('fail', 'Sponsor or Email is already Registered');
        } {
            $query = $sponsorModel->insert($data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to(base_url('/admin/add-sponsors'))->with('success', 'Registration Successful');
            }
        }



    }



    public function getadd_category()
    {
        $data['title'] = ucfirst('admin');



        return view('admin/add_category', $data);
    }


    public function getCategories()
    {
        $data['title'] = ucfirst('admin');
        $categoryModel = new CategoryModel();

        $maleCategory= $categoryModel->where('allowed_gender','male')->findAll();
        $data['male_categories']=$maleCategory;

        $femaleCategory = $categoryModel->where('allowed_gender', 'female')->findAll();
        $data['female_categories'] = $femaleCategory;

        $allCategory = $categoryModel->where('allowed_gender', 'all')->findAll();
        $data['all_categories'] = $allCategory;




        return view('admin/view_categories', $data);
    }



    public function postCategory()
    {
        $categoryTitle = $this->request->getPost('category-title');
        $gender = $this->request->getPost('gender');
        $picture = $this -> uploadImage($this->request->getFile('pictures'));
        $categoryDescription = $this->request->getPost('categoryDescription');

        $data=[
            'title'=>$categoryTitle,
            'allowed_gender'=>$gender,
            'picture'=>$picture,
            'description'=>$categoryDescription,
            'slug'=>$categoryTitle
        ];
        $categoryModel = new \App\Models\CategoryModel();

        $check_title =  $categoryModel->where('title', $categoryTitle)
            ->first();

        if ($check_title) {
            return redirect()->back()->with('fail', 'Category is already Registered');
        } {
            $query = $categoryModel->insert($data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to('/admin/add-category')->with('success', 'Registration Successful');
            }
        }


   
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





    public function getUsers()
    {
        $data['title'] = ucfirst('admin');
        $userModel = new \App\Models\UserModel();
        $searchData = $this->request->getGet();
        $search = "";

        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        if ($search == '') {
            $paginatedData = $userModel->paginate(10);
        } else {
            $paginatedData = $userModel->select('*')
                ->orLike('full_name', $search)
                ->orLike('first_name', $search)
                ->orLike('last_name', $search)
                ->orLike('email', $search)
                ->orLike('phone', $search)
               

                ->paginate(10);
        }

        $data['users'] = $paginatedData;
        $data['pager'] = $userModel->pager;
        $data['search'] = $search;




        return view('admin/view_users', $data);
    }




    public function getedit_contest(int $title)
    {

        $data['title'] = ucfirst('admin');
        $contestModel = new \App\Models\ContestModel();
        $contest = $contestModel->find($title);
        $data['contest']=$contest;
        $categoryModel = new \App\Models\CategoryModel();
        $categories = $categoryModel->findAll();
        $data['categories'] = $categories;

        return view('admin/edit_contest', $data);
    }
    public function getedit_category(int $title)
    {
        $data['title'] = ucfirst('admin');
        $categoryModel = new \App\Models\CategoryModel();
        $category = $categoryModel->find($title);
        $data['category'] = $category;
        return view('admin/edit_category', $data);
 
    }

    public function postedit_category(int $title)
    {
        $data['title'] = ucfirst('admin');
        $categoryModel = new \App\Models\CategoryModel();
        $category = $categoryModel->find($title);
        $data['category']=$category;

        $categoryTitle = $this->request->getPost('category-title');
        $gender = $this->request->getPost('gender');
        $picture = $this->uploadImage($this->request->getFile('pictures'));
        $categoryDescription = $this->request->getPost('categoryDescription');

        $data = [
            'title' => $categoryTitle,
            'allowed_gender' => $gender,
            'picture' => $picture,
            'description' => $categoryDescription,
            'slug' => $categoryTitle
        ];

        $check_title =  $categoryModel->where('title', $categoryTitle)
            ->first();

        if ($check_title) {
            return redirect()->back()->with('fail', 'Category is already Registered');
        } {
            $query = $categoryModel->update($title,$data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to('/admin/add-category')->with('success', 'Registration Successful');
            }
        }



       




    }


    public function getdelete_contest(int $id)
    {

        $contestModel = new \App\Models\ContestModel();
      
        ## Check record
        if ($contestModel->find($id)) {

            ## Delete record
            $contestModel->delete($id);

            session()->setFlashdata('message', 'Deleted Successfully!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', 'Record not found!');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        // return redirect()->route(base_url('/admin/view-contest'));
        return redirect()->to('/admin/view-contest')->with('success', 'Deleted Successfuly!');
    }
    public function getdelete_sponsor (int $id)
    {
        $sponsorModel = new SponsorModel();


        if ($sponsorModel->find($id)) {

            ## Delete record
            $sponsorModel->delete($id);

            session()->setFlashdata('message', 'Deleted Successfully!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', 'Record not found!');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        // return redirect()->route(base_url('/admin/view-contest'));
        return redirect()->to(base_url('/admin/sponsors'))->with('success', 'Deleted Successfuly!');





    }
    public function getdelete_category(int $id)
    {
        $categoryModel = new CategoryModel();


        if ($categoryModel->find($id)) {

            ## Delete record
            $categoryModel->delete($id);

            session()->setFlashdata('message', 'Deleted Successfully!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', 'Record not found!');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        // return redirect()->route(base_url('/admin/view-contest'));
        return redirect()->to(base_url('/admin/categories'))->with('success', 'Deleted Successfuly!');
    }
   

}
