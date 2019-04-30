<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    
    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
    // public function supplier(){
    //     return $this->belongsTo(Supplier::class);
    // }
}
