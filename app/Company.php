<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
