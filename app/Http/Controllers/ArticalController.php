<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Http\File;
use App\Http\Requests;
use App\Artical;
use Parsedown;

class ArticalController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $file = $request->file;
            if($file->isValid()){
                $type = $file->getClientMimeType();
                if ($type != "text/markdown") {
                    return "不支持的文件类型，请上传markdown文档";
                }
                $artical = Artical::saveArtical($file);
                dd($artical);
            }
        }
        return view('Artical.artical');
    }

    public function show($id)
    {
        $artical = Artical::find($id);
        if ($artical == null) {
            return "没有找到该文章";
        }
        $file = Storage::disk('artical')->get($artical->file_name);
        $Parsedown = new Parsedown();
        echo Parsedown::instance()->text($file);
    }

    public function find($userId)
    {
        $artices = Artical::where('user_id', $userId)->get();
        foreach ($artices as $artical) {
            var_dump($artical->file_name."</br>");
        }
        dd($artices);
    }
}
