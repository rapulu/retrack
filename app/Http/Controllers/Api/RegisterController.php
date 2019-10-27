<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        $payload = [
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        if (User::create($payload)){
          $response = [
              'success' => true,
              'data'=>'You have '
            ];
          return response()->json($response, 200);
        }

    }
}
