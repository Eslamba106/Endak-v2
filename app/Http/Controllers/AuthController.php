<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Auth\UserServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }
    public function loginPage()
    {
        return view('front_office.auth.login');
    }
    public function registerPage()
    {
        return view('front_office.auth.register');
    }


    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user = User::where('email', $request['email'])->orWhere('phone', $request['email'])->first();
            
            // if($user->role_name != "admin"){
            //     return redirect()->route('home');
            // }elseif ($user->role_name == "admin") {
            //     return redirect()->route('admin.dashboard');
            // }
        } else {
            return back()->withErrors([
                'loginError' => 'خطأ في البريد الالكتروني او كلمة المرور . من فضلك حاول مرة اخري',
            ]);
        }

        

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login-page');
    }
    public function forgotPassword()
    {
        return view('front_office.auth.forgot-password');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => "required",               // First name is required
            'last_name' => "required",                // Last name is required
            'email' => "email",                       // Email must be a valid email address
            'password' => "required|confirmed|min:6", // Password is required, must be confirmed, and at least 6 characters long
            'phone' => "required",                    // Phone number is required
        ]);
        if($request->image){
            
            $new_image = uploadImage($request , "users" , "image");
        }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_name' => "user",
            'role_id' => 1,
            'image' => $new_image ?? null,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('home');

    }
}
