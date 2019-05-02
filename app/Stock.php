<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    // to call out the parent class
    public function product(){
       return $this->hasOne('product');
    }
}