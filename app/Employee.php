<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function department(){
       return $this->belongsTo(Department::class);
    }
    public function user(){
       return $this->belongsTo(User::class);
    }
}
