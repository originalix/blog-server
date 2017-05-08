<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function articles()
    {
        return $this->hasMany('App\Artical', 'user_id');
    }
}
