<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentServices;

class CommentController extends Controller
{
    public $comment_service;

    public function __construct(CommentServices $comment_service)
    {
        $this->comment_service = $comment_service;
    }
    public function store(Request $request){
        $request->validate([
            "department_id" => "required",
        ]);
        $user = auth()->user()->id;
        $data = $request->all();
        $data['user_id'] = $user;
        $this->comment_service->store($data);
        return redirect()->back()->with('success','Add Seccessfully');
    }
}
