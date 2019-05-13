<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];
    
    public function product(){
       $this->belongsTo(Product::class);
    }
    public function warehouse(){
       $this->belongsTo(Warehouse::class);
    }
    public function user(){
       $this->belongsTo(User::class);
    }
}
