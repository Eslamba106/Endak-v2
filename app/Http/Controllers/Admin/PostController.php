<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy("created_at","desc")->paginate(10);
        return view("admin.posts.index", compact("posts"));
    }

    public function status_update(Request $request)
    {
        $post = Post::find($request['id']);
        $post->status = $request['status'] ?? 0;

        if($post->save()){
            $success = 1;
        }else{
            $success = 0;
        }
        return response()->json([
            'success' => $success,
        ], 200);
    }

}
