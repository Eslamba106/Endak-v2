<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DepartmentServices;

class DepartmentController extends Controller
{
    public $department_service;

    public function __construct(DepartmentServices $department_service)
    {
        $this->department_service = $department_service;
    }

    public function index()
    {
        return response()->apiSuccess($this->department_service->getAllWith('department_id' , 0));
    }
    public function childern($id)
    {
        return response()->apiSuccess($this->department_service->getAllWith('department_id' , $id));
    }
}
