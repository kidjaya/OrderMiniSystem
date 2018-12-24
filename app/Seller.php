<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Seller
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller query()
 * @mixin \Eloquent
 */
class Seller extends Model
{
    protected $fillable = [
        '*'
    ];
    //
    public function getCuisine(){
        return $this->hasMany(SellerCuisine::class,'seller_id','id');
    }
    public function getOrder(){
        return $this->hasMany(Order::class,'seller_id','id');
    }
}
