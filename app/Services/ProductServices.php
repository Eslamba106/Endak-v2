<?php 

namespace App\Services;

use App\Repo\ProductRepo;


class ProductServices extends AbstractService
{
    protected $repo;
    public function __construct(ProductRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
}