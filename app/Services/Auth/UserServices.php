<?php 

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserServices 
{
    public function createUser($request):User
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['role_id'] = 1;
        $data['role_name'] = 'user';
        if($data['image']){
            
            $data['image'] = $this->uploadImage($request);
        }

        return User::create($data);
    }
    public function login($data)
    {
        // dd($data);
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
        {
            $user = User::where('email' , $data['email'])->orWhere('phone' , $data['email'])->first();
            return $user;
        }
        else
        {
            return false;
        }
    }
    public function uploadImage($request)
    {
        if (!$request->hasFile('image')) {
            return;
        } else {
            $file = $request->file('image');
            $path = $file->store('users', [
                'disk' => 'public',
            ]);
            return $path;
        }
    }
}