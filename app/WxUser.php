<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserAddress
 *
 * @property-read \App\User $findUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WxUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WxUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WxUser query()
 * @mixin \Eloquent
 */
    class WxUser extends Model
    {
        //
        protected $fillable = [
            '*'
        ];

        public function getAddress(){
            return $this->hasMany(UserAddress::class,'user_id','id');
        }

        public function getOrder(){
            return $this->hasMany(Order::class,'user_id','id');
        }

    }

    {
    //
}
