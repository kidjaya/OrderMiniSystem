<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerCuisineType extends Model
{
    //
    protected $fillable = [
        '*'
    ];
    public function findSeller(){
        return $this->belongsTo(Seller::class,'seller_id','id');
    }
}
