<?php 

namespace App\Services;

use App\Repo\DepartmentRepo;


class DepartmentServices extends AbstractService
{
    protected $repo;
    public function __construct(DepartmentRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
}