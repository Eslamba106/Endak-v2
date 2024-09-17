<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index(Request $request){
        
        // dd($request->all());
        $departments = Department::with('sub_Departments', 'sub_Departments.sub_Departments')->orderBy('id', 'desc')->paginate(6);
        // dd($departments);
        return view('front_office.departments.index', compact('departments'));
    }
}
