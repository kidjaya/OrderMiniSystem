<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SellerCuisine
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SellerCuisineScale[] $allScale
 * @property-read \App\Seller $findSeller
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SellerCuisine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SellerCuisine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SellerCuisine query()
 * @mixin \Eloquent
 */
class SellerCuisine extends Model
{
    protected $fillable = [
        '*'
    ];
    //
    public function findSeller(){
        return $this->belongsTo(Seller::class,'seller_id','id');
    }
    public function allScale(){
        return $this->hasMany(SellerCuisineScale::class,'cuisine_id','id');
    }
}
