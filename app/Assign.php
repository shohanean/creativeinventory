<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assign extends Model
{
    protected $guarded = [];

    public function product(){
       return BelongsTo(Product::class);
    }
}
