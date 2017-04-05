<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;


class ArticalController extends Controller
{
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
                var_dump('文件名' . $filename);

                // $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));

                // var_dump($bool);
            }
        }
        return view('Artical.artical');
    }
}
