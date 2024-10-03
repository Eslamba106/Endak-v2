<?php 

namespace App\Services;

use App\Repo\RatingRepo;


class RatingServices extends AbstractService
{
    protected $repo;
    public function __construct(RatingRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
}