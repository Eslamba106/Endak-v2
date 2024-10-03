<?php 

namespace App\Services;

use App\Repo\MessageRepo;


class MessageServices extends AbstractService
{
    protected $repo;
    public function __construct(MessageRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
}