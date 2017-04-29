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
    /**新建文章
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newCreate(Request $request)
    {
        if ($request->isMethod('POST')) {
            $artical = $this->saveArtical($request);
            dd($artical);
        }
        return view('artical.artical');
    }

    private function saveArtical(Request $request)
    {
        $artical = $this->validArtical($request);
        if ($artical != null) {
            $artical->user_id = 1;
            $artical->save();
        }
        return $artical;
    }

    private function validArtical(Request $request)
    {
        $artical = new Artical();
        if ($request->get('title')) {
            $artical->title = $request->get('title');
        }
        if ($request->get('desc')) {
            $artical->desc = $request->get('desc');
        }
        if ($request->get('content')) {
            $artical->content = $request->get('content');
        }
        if ($request->get('date')) {
            $artical->created_at = $request->get('date');
        }
        return $artical;
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
        return view('artical.parse');
    }
}
