<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function update(Request $request ){

        $user = auth()->user();
        $data = $request->except('image');
        $new_image = uploadImage($request , "users" , "image");
        $old_image = $user->image;
        if ($new_image) {
            $data['image'] = $new_image;
        }
        $user_update = User::where('id' , $user->id)->first();
        $user_update->update($data);
        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->back()->with('success' , 'تم التحديث بنجاح');
    }
}
