<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Carbon\Carbon;
use Storage;

class Artical extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /** 存储文件并获取文件路径
     * @param $file 存储文件
     * @return artical
     */
    public static function saveArtical($file)
    {
        //获取原文件名
        $originalName = $file->getClientOriginalName();
        //扩展名
        $ext = $file->getClientOriginalExtension();
        //文件类型
        $type = $file->getClientMimeType();
        //临时绝对路径
        $realPath = $file->getRealPath();
        $date = Carbon::now()->timezone('Asia/Shanghai')->format('Y-m-d-H-i-s');
        $filename = md5($originalName).$date.".".$ext;
        var_dump('filename = '. $filename);
        Storage::disk('artical')->putFileAs('/', new File($file), $filename);
        $url = Storage::disk('artical')->url($filename);
        var_dump('url = ' . $url);
        $artical = Artical::Create([
            'title' => $originalName,
            'user_id' => 1,
            'description' => 'something',
            'file_name' => $filename,
            'file_path' => $url
        ]);
        return $artical;
    }
}
