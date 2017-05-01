<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Http\File;
use App\Http\Requests;
use App\Artical;
use App\ArticalContent;
use Parsedown;
use App\Helper\ApiHelper;

class ArticalController extends Controller
{
    /**新建文章
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $artical = $this->saveArtical($request);
            dd($artical);
        }
        return view('artical.artical');
    }

    private function saveArtical(Request $request)
    {
        $isValid = $this->validArtical($request);
        if (!$isValid) {
            return null;
        }
        $artical = new Artical();
        $articalContent = new ArticalContent();
        $title = $request->get('title');
        $desc = $request->get('desc');
        $content = $request->get('content');
        $date = $request->get('date');
    }

    private function validArtical(Request $request)
    {
        if (!$request->get('title')) {
            return false;
        }
        if (!$request->get('content')) {
            return false;
        }
        if (!$request->get('date')) {
            return false;
        }
        return true;
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
        $data = array('artical' => $artical);
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
            $title = $artical->title;
            $artical = array(
                'id' => $artical->id,
                'title' => $title,
                'createdTime' => $artical->created_at->format('Y-m-d'),
                'description' => $artical->desc
            );
            $data[] = $artical;
        }
        return ApiHelper::responseForSuccess($data);
    }

    public function parse(Request $request)
    {
        $artical = Artical::find(4);
        if ($artical == null) {
            return "没有找到该文章";
        }
        $file = Storage::disk('artical')->get($artical->file_name);
        return view('artical.parse');
    }
}
