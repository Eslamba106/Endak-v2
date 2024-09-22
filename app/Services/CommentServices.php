<?php 

namespace App\Services;

use App\Repo\CommentRepo;


class CommentServices extends AbstractService
{
    protected $repo;
    public function __construct(CommentRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
}