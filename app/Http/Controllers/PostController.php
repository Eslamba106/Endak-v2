<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\PostServices;

class PostController extends Controller
{
    public $post_service;

    public function __construct(PostServices $post_service)
    {
        $this->post_service = $post_service;
    }

    public function index($id)
    {
        $posts = $this->post_service->getAllWith('department_id' , $id);
        // dd($posts);
        return view('front_office.posts.all', compact('posts'));
    }
    public function create($id)
    {
        // dd($id);
        $department = Department::findOrFail($id);
        return view('front_office.posts.create', compact('department'));
    }
    public function store(Request $request){
        $request->validate([
            "department_id"=> "required",
        ]);
        $user =  auth('sanctum')->user()->id;
        $data = $request->all();
        $data['user_id'] = $user; 
        return response()->apiSuccess($this->post_service->store($data));
    }
}
