<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assign extends Model
{
    protected $guarded = [];

    public function product(){
       return $this->belongsTo(Product::class);
    }

    public function user(){
       return $this->belongsTo(User::class);
    }
}
