<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = __('department');
        $data['categories'] = Department::with('sub_Departments', 'sub_Departments.sub_Departments')->orderBy('id', 'desc')->paginate(2);

        return view('admin.departments.departments', $data);
    }

    public function create(){
        $data['title'] = __('departments');
        $data['sub_title'] = __('department_create');
        $data['categories'] = Department::with('sub_Departments')->orderBy('name', 'asc')->get();

        return view('admin.departments.department_add', $data);
    }

}
