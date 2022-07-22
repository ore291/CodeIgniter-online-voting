<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContestModel;
use App\Models\ContestantsModel;
use App\Models\CategoryModel;
use App\Models\VoteModel;
use App\Models\SponsorModel;
use App\Libraries\GetContestants;
use App\Libraries\Votes;
use App\Libraries\Utils;


class Contest extends BaseController
{
    public function getIndex()
    {
        return "";
    }

    public function postupdate_profile($contestant_id)
    {
        $contestant_model = new ContestantsModel();
        $contestant = $contestant_model->find($contestant_id);
        $image = $this->request->getFile('picture');

        if ($contestant) {
            if ($image) {
                $picture =  Utils::uploadImage($image);

                $contestant_data = [
                    'image' => $picture,
                ];

                $query = $contestant_model->update($contestant_id, $contestant_data);
                if (!$query) {
                    return redirect()->back()->with('fail', 'Upload Failed');
                } else {
                    return redirect()->back();
                }
            } else {
                return redirect()->back()->with('fail', 'Upload Failed get name');
            };
        } else {
            return redirect()->back();
        }
    }
    public function getTitle($slug)
    {
        $contest_model = new ContestModel();
        $category_model = new CategoryModel();
        $sponsor_model = new SponsorModel();
        $contestants_cl = new GetContestants();
        $contestants_model = new ContestantsModel();


        $contest_data = $contest_model->where('contests.slug', $slug)
            ->first();

        $contest_data->contestants_count = $contestants_model->where('contest_id', $contest_data->id)->countAllResults();

        if (isset($contest_data->sponsor_id)) {
            $contest_data->sponsor = $sponsor_model->find($contest_data->sponsor_id);
        }


        $category_data = $category_model->find($contest_data->category);

        $searchData = $this->request->getGet();

        $search = "";
        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        if ($search == '') {
            $contestants = $contestants_cl->getAllContestants($contest_data->id);
        } else {
            $contestants = $contestants_cl->findContestants($contest_data->id, $search);
        }

        $data = [
            'contest' => $contest_data,
            'category' => $category_data,
            'title' => $contest_data->title,
            'contestants' => $contestants,
            'search' => $search,

        ];



        return view("contest", $data);
    }

    public function getcontestants()
    {

        $contestants_cl = new GetContestants();


        $data = [
            'contestants' => $contestants_cl->getAllContestants(9)
        ];

        return view('contest_test', $data);
    }

    public function postjoin()
    {
        $contest_id = $this->request->getPost('contest_id');
        $user = session()->get('user');
        $share_id = $contest_id . '/' . $user->id;

        $data = [
            'user_id' => $user->id,
            'contest_id' => $contest_id,
            'share_url' => base_url("contest/view/" . $share_id),
            'slug' => $share_id,
            'image' => $user->picture,
            'full_name' => $user->full_name
        ];

        $contestant_model = new ContestantsModel();

        $contestant = $contestant_model->where('user_id', $user->id)->where('contest_id', $contest_id)
            ->first();

        if (isset($contestant)) {
            return redirect()->back()->with('fail', "User already registered");
        } else {

            $query = $contestant_model->insert($data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Contest registration Failed');
            } else {
                return redirect()->to("contest/view/" . $share_id)->with('success', 'Registration Successful');
            }
        }
    }
    public function getview($contest_id, $user_id)
    {

        $contest_model = new ContestModel();
        $contestant_model =  new ContestantsModel();


        $contest = $contest_model->find($contest_id);
        $contestants_cl = new GetContestants();

        $contestant = $contestants_cl->getContestant($contest_id, $user_id);

        $data = [
            'title' => 'view-profile',
            'contest' => $contest,
            'contestant' => $contestant
        ];
        return view('contestant_profile', $data);
    }

    public function postvote($ref, $contestant_id)
    {

        $data = $this->request->getJSON();

        $vote_model = new VoteModel();
        $vote_cl = new Votes();


        // save vote records 

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_5dbaccf801146c4e853762c6d634bbbfb83bcee4",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $result = array();

        if ($response) {
            $result = json_decode($response, true);
        }

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
                $vote_data = [
                    'email' => $data->email,
                    'name' => $data->name,
                    'vote_count' => $data->vote_count,
                    'cost' => $data->cost,
                    'contestant_id' => $contestant_id,
                    'reference' => $ref
                ];

                $vote_insert_query = $vote_model->insert($vote_data);


                $voted = $vote_cl->registerVotes($contestant_id, $data->vote_count);

                if ($voted) {
                    return $response;
                }
            }
        }
    }

    public function postevict()
    {

        $stage = $this->request->getPost('stage');
        $contest_id = $this->request->getPost('contest_id');

        $contestant_cl = new GetContestants();

        $query =  $contestant_cl->evictContestants($contest_id, $stage);

        if($query)
        {
            return redirect()->back()->with("success", "Eviction successful");
        }else
        {
            return redirect()->back()->with("fail" ,"Something went wrong");
        }


    }
}
