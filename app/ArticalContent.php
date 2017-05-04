<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticalContent extends Model
{
    protected $table = 'articlesContent';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function artical()
    {
        return $this->belongsTo('App\Artical');
    }

    public static function init($artical, $content)
    {
        $articalContent = new ArticalContent();
        $articalContent->artical_id = $artical->id;
        $articalContent->title = $artical->title;
        $articalContent->desc = $artical->desc;
        $articalContent->content = $content;
        $articalContent->created_at = $artical->created_at;
        $articalContent->save();
        return $articalContent;
    }
}
