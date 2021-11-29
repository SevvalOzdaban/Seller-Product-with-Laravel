<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    use HasFactory;
    // public function sellerRel(){
    //     return $this->hasMany('App\product');
    // }
    public function product(){
        return $this->belongsToMany('App\Models\product','product_sellers','sellerId','productId')->withPivot('price', 'stock');;
}
}