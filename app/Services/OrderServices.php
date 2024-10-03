<?php 

namespace App\Services;

use App\Repo\OrderRepo;


class OrderServices extends AbstractService
{
    protected $repo;
    public function __construct(OrderRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
}