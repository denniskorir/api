<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{
    //
    protected $fillable =[
        'name','details','stock','price','discount'

    ];

    Public function review(){

        return $this->hasMany(Review::class);
    }
}
