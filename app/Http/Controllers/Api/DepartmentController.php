<?php

namespace App\Http\Controllers\Api;

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
        $date = $this->department_service->getAllWith('department_id', 0);
        
        return response()->apiSuccess();
    }
    public function childern($id)
    {
        return response()->apiSuccess($this->department_service->getAllWith('department_id', $id));
    }
    public function showDepartment($id)
    {
        $inputs = $this->department_service->show($id)->inputs;
        $data['inputs'] = $inputs;
        $data['products'] = $this->department_service->show($id)->products;
        if ($data['inputs']->count() > 0) {

            return response()->apiSuccess($data);
        } else {
            return response()->apiFail("There is No inputs the department is parent", 400);
        }
    }
}
