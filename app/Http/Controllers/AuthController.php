<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;


class AuthController extends Controller
{
    public function registerPage(){
        return view("auth.register");
    }

    public function loginPage(){
        return view("auth.login");
    }

    public function register(RegisterRequest $request){

    }

    public function login(LoginRequest $request){

    }
}
