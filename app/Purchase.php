<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Faker\Provider\ru_RU\Company;

class Purchase extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    // to call out the parent class
    public function company(){
       return $this->belongsTo(Company::class);
    }
    public function supplier(){
       return $this->belongsTo(Supplier::class);
    }
    public function product(){
       return $this->belongsTo(Product::class);
    }
}
