<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticalContent extends Model
{
    protected $table = 'ArticlesContent';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];
}
