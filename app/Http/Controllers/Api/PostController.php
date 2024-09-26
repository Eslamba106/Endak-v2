<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PostServices;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public $post_service;

    public function __construct(PostServices $post_service)
    {
        $this->post_service = $post_service;
    }

    public function index($id)
    {
        return response()->apiSuccess($this->post_service->getAllWith('department_id' , $id));
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
