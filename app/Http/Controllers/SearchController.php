<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $departments = Department::where('name_ar', 'LIKE', "%{$query}%")
            ->orWhere('name_en', 'LIKE', "%{$query}%")
            ->get();
        $users = User::where('role_id', 3)->where('about_me', 'LIKE', "%{$query}%")
        // ->orWhere('name_en', 'LIKE', "%{$query}%")
            ->get();
        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->get();

        return view('front_office.search.results', compact('departments', 'query', 'users' , 'posts'));
    }
}
