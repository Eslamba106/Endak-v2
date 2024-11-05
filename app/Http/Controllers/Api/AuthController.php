<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\Auth\UserServices;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }
    // login function
    public function login(Request $request)
    {

        $loginResponse = $this->userService->login($request->all());
        if ($loginResponse != false  ) {
            $user = $request->user();
            $user['rate'] = $user->rates() ;
            $token = $user->createToken("$user->first_name");
            return response()->apiSuccess(['token' => $token->plainTextToken, 'user' => $user]);
        }else{
            return response()->apiFail('Unauthorised' ,  401);
        }
    }

    public function register(Request $request)
    {

        $user = $this->userService->createUser($request);
        $message['user'] = $user;
        $message['token'] = $user->createToken("user")->plainTextToken;

        return response()->apiSuccess($message);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'massege' => 'User Successfully logout',
        ], 200);
    }
}
