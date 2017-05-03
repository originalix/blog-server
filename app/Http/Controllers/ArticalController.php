<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Cookie;
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
        $cookie = $request->cookie('lix_blog_token');
        if ($cookie == null) {
            return redirect('login');
        }
        if ($request->isMethod('POST')) {
            $artical = $this->saveArtical($request);
            if (!$artical) {
                return view('artical.upload')->with('error', '上传文章失败');
            }
            return view('artical.upload')->with('artical', $artical);
        }
        return view('artical.artical');
    }

    private function saveArtical(Request $request)
    {
        $isValid = $this->validArtical($request);
        if (!$isValid) {
            return null;
        }
        $title = $request->get('title');
        $desc = $request->get('desc');
        $content = $request->get('content');
        $date = $request->get('date');
        $artical = Artical::init(1, $title, $desc, $date);
        $content = ArticalContent::init($artical, $content);
        return $content;
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
        $artical = ArticalContent::find($id);
        if ($artical == null) {
            return "没有找到该文章";
        }
//        $artical->content = Parsedown::instance()->text($content);
        return view('artical.show')->with('artical', $artical);
    }

    public function find($id)
    {
        $artical = ArticalContent::find($id);
        if ($artical == null) {
            return "没有找到该文章";
        }
        $data = array(
            'id' => $artical->artical_id,
            'title' => $artical->title,
            'createdTime' => $artical->created_at->format('Y-m-d'),
            'description' => $artical->desc,
            'content' => $artical->content
        );
        return ApiHelper::responseForSuccess($data, 'artical');
    }

    public function findUserArtices($userId)
    {
        $artices = Artical::where('user_id', $userId)->get();
        foreach ($artices as $artical) {
            var_dump($artical->title."</br>");
        }
        dd($artices);
    }

    public function articalList($userId, Request $request)
    {
        $count = $request->input('list');
        if ($count != null) {
            $artices = Artical::where('user_id', $userId)->orderBy('updated_at', 'desc')->paginate($count);
        } else {
            $artices = Artical::where('user_id', $userId)->orderBy('updated_at', 'desc')->paginate(3);
        }
        return $artices;
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
