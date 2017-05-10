<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testBelong extends Model
{
    protected $table = 'test_belong';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function main()
    {
        return $this->belongsTo('App\testMain');
    }
}
