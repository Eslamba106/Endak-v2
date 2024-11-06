<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use App\Models\Post;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {

        $departments = Department::where('department_id', 0)->orderBy('id', 'desc')->paginate(6);
        return view('front_office.departments.index', compact('departments'));
    }
    public function show($id, Request $request)
    {
        $department = Department::findOrFail($id);
        $main_department = null;

        if ($department->department_id == 0) {
            $main_department = $department;
        }

        if ($main_department->sub_Departments->isNotEmpty()) {
            $sub_departments = Department::where('department_id', $main_department->id)
                ->with('sub_Departments', 'sub_Departments.sub_Departments')
                ->paginate(6);

            return view('front_office.departments.show', compact('sub_departments'));
        }

        // if ($main_department->sub_Departments->isEmpty() && $main_department->posts->isNotEmpty()) {
        //     $products = $main_department->products;
        //     $posts = Post::where('department_id', $main_department->id)->paginate(6);
        //     return view('front_office.departments.show_posts', compact('posts', 'products'));
        // }

        // if ($main_department->sub_Departments->isEmpty() && $main_department->products->isNotEmpty()) {
        //     $categories = Category::get();
        //     $products_query = $main_department->products()->newQuery(); // Initialize query
        //     if ($request->bulk_action_btn == 'filter') {
        //         if ($request->category) {
        //             if ($request->category) {
        //                 $products_query = $products_query->whereHas('topics', function ($query) use ($request) {
        //                     $query->whereIn('products_categories.category_id', $request->category); // Specify table name to avoid ambiguity
        //                 });
        //             }

        //         }
        //         $products = $products_query->get();
        //     } else {
        //         $products = $main_department->products;
        //     }

        //     return view('front_office.departments.show_product', compact('products', 'categories'));
        // }
        else {
            $categories = Category::get();
            $products_query = $main_department->products()->newQuery(); // Initialize query
            if ($request->bulk_action_btn == 'filter') {
                if ($request->category) {
                    if ($request->category) {
                        $products_query = $products_query->whereHas('topics', function ($query) use ($request) {
                            $query->whereIn('products_categories.category_id', $request->category); // Specify table name to avoid ambiguity
                        });
                    }

                }
                $products = $products_query->paginate(5);
            } else {
                $products = $main_department->products;
            }$posts = Post::where('department_id', $main_department->id)->paginate(6);
            return view('front_office.departments.show_posts', compact('posts', 'products', 'categories'));
        }
    }

    // public function show($id){
    //     $department = Department::findOrFail($id);

    //     $departments = Department::where('department_id' , $department->id)->with('sub_Departments', 'sub_Departments.sub_Departments')->paginate(6);
    //     if($departments->isNotEmpty()){

    //         return view('front_office.departments.show' , compact('departments'));
    //     }
    //     elseif($department->products->isNotEmpty()){

    //         return view('front_office.departments.show_product' , compact('departments'));
    //     }elseif($department->posts->isNotEmpty()){
    //         return view('front_office.departments.show_posts' , compact('departments'));

    //     }
    // }
}
