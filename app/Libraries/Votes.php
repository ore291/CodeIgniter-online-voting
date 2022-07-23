<?php

namespace App\Libraries;

use App\Models\ContestModel;
use App\Models\ContestantsModel;
use App\Models\UserModel;
use App\Models\StageModel;

class Votes
{
    public function registerVotes($contestant_id, $vote_count)
    {
        $ContestModel = new ContestModel();
        $contestant_model =  new ContestantsModel();
        $stage_model = new StageModel();

        $contestant = $contestant_model->find($contestant_id);

        $total_user_votes = $contestant->votes + $vote_count;

        $stage = 99;

        if ($total_user_votes > 99 && $total_user_votes < 200) {
           $stage = 1;
        } elseif ( $total_user_votes > 199 && $total_user_votes < 300) {
            $stage = 2;
        } elseif ( $total_user_votes > 299 && $total_user_votes < 350) {
            $stage = 3;
        } elseif ( $total_user_votes > 349) {
            $stage = 4;
        } 

        $contest = $ContestModel->find($contestant->contest_id);


        $contestant_vote_data = [
            'votes' => $contestant->votes + $vote_count, 
            'stage' => $stage   
        ];

        $query = $contestant_model->update($contestant_id, $contestant_vote_data);

        if($query)
        {
            $contest_total_votes = [
                'total_votes'=> $contest->total_votes + $vote_count,
            ];

            $ContestModel->update($contest->id, $contest_total_votes);

            return True;
        }


    }
}
