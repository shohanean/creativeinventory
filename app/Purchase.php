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
       return $this->hasOne(Company::class, 'id', 'company_id');
    }
    public function supplier(){
       return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }
    public function product(){
       return $this->belongsTo(Product::class);
    }
}
