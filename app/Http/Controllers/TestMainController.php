<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testBelong;
use App\testMain;

class TestMainController extends Controller
{
    public function test()
    {
        $main = testMain::create([
            'nikename' => 'lix',
            'mobile' => '18814868888',
            'password' => '123456'
        ]);
        return ['code' => 200, 'testMain' => $main];
    }

    public function belong()
    {
        $main = testMain::find(2);
        $belong = testBelong::create([
            'main_id' => $main->id,
            'content' => 'balabala'
        ]);
        return ['code' => 200, 'testBelong' => $belong];
    }

    public function delete()
    {
        $main = testMain::where('id', 2)
                        ->delete();
        return ['code' => 200, 'testMain' => $main];
    }
}
