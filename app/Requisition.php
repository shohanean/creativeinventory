<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisition extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function product(){
        return $this->belongsTo(Product::class);
     }

    public function user(){
       return $this->belongsTo(User::class);
    }

}
