<?php 

namespace App\Services;

use App\Repo\PostRepo;


class PostServices extends AbstractService
{
    protected $repo;
    public function __construct(PostRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
}