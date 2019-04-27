<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function user(){
       return $this->hasOne('App\User', 'id', 'user_id');
    }

//     public function products(){
//        return $this->hasMany(Product::class);
//     }
}