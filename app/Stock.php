<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    // to call out the parent class

    public function product(){
       return $this->belongsTo(Product::class);
    }
    
    // public function product(){
    //    return $this->belongsTo(Product::class);
    // }
}