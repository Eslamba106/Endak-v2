<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CommentServices;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public $comment_service;

    public function __construct(CommentServices $comment_service)
    {
        $this->comment_service = $comment_service;
    }

    public function index($id)
    {
        // $this->authorize('Show_Comments');
        return response()->apiSuccess($this->comment_service->getAllWith('post_id' , $id));
    }
    public function store(Request $request){
        // $this->authorize('Add_Comment');
        // $data['department_id'] = 
        $user =  auth('sanctum')->user()->id;
        $data = $request->all();
        $data['user_id'] = $user; 
        try{
            $comment_data = $this->comment_service->store($data);
        }catch(\Exception $e){
            $message = $e->getMessage();
        }
        if(isset($data)){
            return response()->apiSuccess($comment_data);
        }else{
            return response()->apiFail($message ?? "fail");
        }
    }
}
