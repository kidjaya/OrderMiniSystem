<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderDetail
 *
 * @property-read \App\Order $findOrder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail query()
 * @mixin \Eloquent
 */
class OrderDetail extends Model
{
    protected $fillable = [
        '*'
    ];
    //
    public function findOrder(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
