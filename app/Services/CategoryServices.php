<?php 

namespace App\Services;

use App\Repo\CategoryRepo;


class CategoryServices extends AbstractService
{
    protected $repo;
    public function __construct(CategoryRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
}