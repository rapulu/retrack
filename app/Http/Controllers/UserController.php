<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function list()
    {
        return User::all();
    }
    public function user($email)
    {

    }
}
