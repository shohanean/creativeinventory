<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    
    // to call out the parent class
    public function warehouse(){
        return $this->hasOne(Warehouse::class, 'id', 'warehouse_id');
    }
    public function category(){
        // return $this->hasOne(Category::class, 'id', 'category_id');
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    // to inverse 
    public function purchase(){
       return $this->belongsTo(Purchase::class);
    }

    public function stock(){
        return $this->belongsTo(Stock::class );
    }
}
