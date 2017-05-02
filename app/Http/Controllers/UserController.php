<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Helper\Token;

class UserController extends Controller
{
    public function register()
    {
        $username = 'originalix';
        $password = '930127';
        $password = Hash::make($password);
        $bool = User::where ('username', $username)->first();
        if ($bool != Null) {
            return ApiHelper::responseForError('该账号已存在', 422);
        }
        $user = User::Create([
            'username' => $username,
            'password' => $password
        ]);
        $user->remember_token = Token::createToken($user->id, $user->username, $user->created_at->getTimestamp());
        $user->save();
        dd($user);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (!$this->validUserInfo($request)) {
                dd('账号验证失败');
                return;
            }
            $username = $request->get('username');
            $password = $request->get('password');
            $user = User::where ('username', $username)->first();
            if ($user == null) {
                return;
            }
            if (!Hash::check($password, $user->password)) {
                return;
            }
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