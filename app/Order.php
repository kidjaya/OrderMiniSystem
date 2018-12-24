<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property-read \App\Seller $findSeller
 * @property-read \App\User $findUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $fillable = [
        '*'
    ];
    //
    public function findUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function findSeller(){
        return $this->belongsTo(Seller::class,'seller_id','id');
    }
    public function getDetail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
