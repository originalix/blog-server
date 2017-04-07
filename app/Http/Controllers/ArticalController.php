<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Http\File;
use App\Http\Requests;
use App\Artical;
// use Carbon\Carbon;

class ArticalController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showArtical(Request $request)
    {
        if ($request->isMethod('POST')) {
            $file = $request->file;
            if($file->isValid()){
                $artical = Artical::saveArtical($file);
                dd($artical);
            }
        }
        return view('Artical.artical');
    }
}
