<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    // to call out the parent class
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    // to inverse
    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
}
