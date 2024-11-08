<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentsFiles;
use App\Services\CommentServices;

class CommentController extends Controller
{
    public $comment_service;

    public function __construct(CommentServices $comment_service)
    {
        $this->comment_service = $comment_service;
    }
    public function store(Request $request){
        // $request->validate([
        //     "department_id" => "required",
        // ]);
        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
    

        $user = auth()->user()->id;
        $data = $request->except('image');
        $data['user_id'] = $user;
        
        $comment = $this->comment_service->store($data);
        if ($request->hasFile('image')) {
            $paths = [];  
    
            foreach ($request->file('image') as $image) {
                $path = $image->store('public/comments');
                CommentsFiles::create([
                    'comment_id' => $comment->id,
                    'file'       => $path, 
                ]);
            }
        }
        return redirect()->back()->with('success','Add Seccessfully');
    }
}
