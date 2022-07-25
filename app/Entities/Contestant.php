<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Contestant extends Entity
{
    public $user;
    public $stage_data; 
    public $contest;

    public function __construct ( $data = null)
    {
        parent::__construct($data);

        // Set the ingredient list to an empty array
        $this->user = [];
        $this->stage_data = [];
        $this->contest = [];
    }
 
}
