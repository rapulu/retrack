<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\LoginResource;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function token($email, $password )
    {
        $token = null;
        //$credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt( ['email'=>$email, 'password'=>$password])) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'Password or email is invalid',
                    'token'=>$token
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'Token creation failed',
            ]);
        }
        return $token;
    }

    public function login(LoginRequest $request)
    {

        $creds = $request->only(['email', 'password']);

        return $creds;

        if(!$token = auth()->attempt($creds)){
            return response()->json(['error' => 'Incorrect email/password']);
        }

        return response()->json(['token' => $token]);
    }


}
