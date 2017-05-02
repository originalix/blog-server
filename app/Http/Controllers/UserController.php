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

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($this->validUserInfo($request)) {
                return;
            }
            $username = $request->get('username');
            $password = $request->get('password');
            
        }
        return view('Users.login');
    }

    private function validUserInfo(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        if ($username == null || $password == null) {
            return false;
        }
        if (!preg_match('/^[a-za-z0-9_]{5,16}$/', $username)) {
            return false;
        }
        if (!preg_match('/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{5,16}$/', $password)) {
            return false;
        }
        return true;
    }
}