<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Http\File;
use App\Http\Requests;


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
            // dd($file);
                //判断文件是否上传成功
            if($file->isValid()){
                //获取原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //文件类型
                $type = $file->getClientMimeType();
                //临时绝对路径
                $realPath = $file->getRealPath();
                $filename = $originalName;
                var_dump('原始文件名' . $originalName . '<br>');
                var_dump('扩展名' . $ext . '<br>');
                var_dump('文件类型' . $type . '<br>');
                var_dump('临时绝对路径' . $realPath . '<br>');
                var_dump('文件名' . $filename . '<br>');
                // $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                // var_dump($bool);
                // $bool = Storage::disk('public')->putFileAs('artical', new File($file), $originalName);
                $bool = Storage::putFileAs('public', new File($file), $originalName);
                var_dump($bool);
                $url = Storage::url($originalName);
                var_dump($url);
            }
        }
        $exists = Storage::disk('artical')->exists('3.16叙述.md');
        var_dump($exists);
        $files = Storage::files('artical');
        var_dump($files);
        $contents = Storage::disk('artical')->get('3.16叙述.md');
        var_dump($contents);
        return view('Artical.artical');
    }
}
