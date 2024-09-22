<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index(Request $request){
        
        // dd($request->all());
        $departments = Department::where('department_id'  ,0)->orderBy('id', 'desc')->paginate(6);
        // $departments = Department::with('sub_Departments', 'sub_Departments.sub_Departments')->orderBy('id', 'desc')->paginate(6);
        // dd($departments);
        return view('front_office.departments.index', compact('departments'));
    }
    public function show($id){
        $department = Department::findOrFail($id);

        $departments = Department::where('department_id' , $department->id)->with('sub_Departments', 'sub_Departments.sub_Departments')->paginate(6);

        return view('front_office.departments.show' , compact('departments'));
    }
}
