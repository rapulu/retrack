<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $creds = $request->only(['email', 'password']);
    
        if(!$token = auth()->attempt($creds)){
            return response()->json(['error' => 'Incorrect email/password']);
        }

        return response()->json(['token' => $token]);
    }
}
