<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testMain extends Model
{
    protected $table = 'test_main';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function articles()
    {
        return $this->hasOne('App\testBelong', 'main_id');
    }
}
