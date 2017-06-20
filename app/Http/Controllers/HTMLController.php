<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HTMLController extends Controller
{
    public function test()
    {
        return view('Test.cache');
    }
}
