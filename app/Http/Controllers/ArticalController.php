<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Http\File;
use App\Http\Requests;
use App\Artical;
use Parsedown;
use App\Helper\ApiHelper;

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
                return view('Artical.artical');
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

    public function find($id)
    {
        $artical = Artical::find($id);
        if ($artical == null) {
            return "没有找到该文章";
        }
        $file = Storage::disk('artical')->get($artical->file_name);
        $data = array('artical' => $file);
        return ApiHelper::responseForSuccess($data);
    }

    public function findUserArtices($userId)
    {
        $artices = Artical::where('user_id', $userId)->get();
        foreach ($artices as $artical) {
            var_dump($artical->title."</br>");
        }
        dd($artices);
    }

    public function articalList($userId)
    {
        $data = array();
        $artices = Artical::where('user_id', $userId)->get();
        foreach ($artices as $artical) {
            $title = substr($artical->title, 0, -3);
            $artical = array(
                'id' => $artical->id,
                'title' => $title,
                'createdTime' => $artical->created_at->format('Y-m-d'),
                'description' => $artical->description
            );
            $data[] = $artical;
        }
        // dd($data);
        return ApiHelper::responseForSuccess($data);
    }

    public function parse(Request $request)
    {
        $artical = Artical::find(4);
        if ($artical == null) {
            return "没有找到该文章";
        }
        $file = Storage::disk('artical')->get($artical->file_name);
        return view('artical.base');
    }
}
