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
    /**
     * 获取用户的名字
     *
     * @param  int  $value
     * @return string
     */
    public function getSellerTypeAttribute($value)
    {
        switch($value){
            case 0:return ucfirst("全部");
            case 1:return ucfirst("中餐");
            case 2:return ucfirst("西餐");
            case 3:return ucfirst("饮料");
            case 4:return ucfirst("水果");
            default: return ucfirst("其他");
        }
    }

    public function getType(){
        return $this->hasMany(SellerCuisineType::class,'seller_id','id');
    }
    public function getCuisine(){
        return $this->hasMany(SellerCuisine::class,'seller_id','id');
    }
    public function getOrder(){
        return $this->hasMany(Order::class,'seller_id','id');
    }
}
