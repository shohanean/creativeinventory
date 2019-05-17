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

    // public function warehouse(){
    //     return $this->hasOne(Warehouse::class, 'id', 'warehouse_id');
    // }
    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function purchase(){
       return $this->belongsTo(Purchase::class);
    }

    public function company(){
       return $this->belongsTo(Company::class);
    }



    // to inverse
    public function stock(){
        return $this->hasMany(Stock::class );
    }

    public function inventory(){
        return $this->hasMany(Inventory::class );
    }

    public function assign(){
        return $this->hasMany(Assign::class );
    }


    // SCOPE
    public function scopeStatusName(){
       return[
        1 => 'Available'
       ];
    }
}
