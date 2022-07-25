<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Contest extends Entity
{
    public $sponsor;
    public $contestants_count;
    public $winner;
    public $category_d;

    public function __construct ( $data = null)
    {
        parent::__construct($data);

        // Set the ingredient list to an empty array
        $this->sponsor = [];
        $this->contestants_count = [];
        $this->winner = [];
        $this->category_d = [];

    }
}
