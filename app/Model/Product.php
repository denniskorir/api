<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{
    //

    Public function review(){

        return $this->hasMany(Review::class);
    }
}
