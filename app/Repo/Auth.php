<?php 


namespace App\Repo;


class Auth implements AuthModel
{

    
    public function login ($request){
        if(auth()->attempt(['email'=>$request->input('email') , 'password'=>$request->input('password')])){
            return redirect()->route('admin.dashboard');
        };
        
    }
    public function logout(){
        return "";
    }
    public function register($request){
        return "";
    }

}