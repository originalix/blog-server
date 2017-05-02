<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function register()
    {
        $user = User::Create([
            'username' => 'originalix',
            'password' => '930127'
        ]);

        dd($user);
    }

    public function login()
    {
        return view('Users.login');
    }
}
