<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id){
        
        $user = User::findOrFail($id);

        return view('front_office.profile.show' , compact('user'));
    }
    public function edit($id){
        $user = User::findOrFail($id);

        return view('front_office.profile.edit' , compact('user'));
    }
    public function users(){

        $users = User::where('role_id' , 3)->paginate(6);

        return view('front_office.user.all_user' , compact('users'));
    }
}
