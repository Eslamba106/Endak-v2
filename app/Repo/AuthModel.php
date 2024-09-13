<?php 


namespace App\Repo;
use App\Repo\Auth;

interface AuthModel
{
    public function login($request);


    public function register($request);

    public function logout();
}