<?php

namespace App\Repo;

use App\Models\Department;


class DepartmentRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Department::class);
    }
}