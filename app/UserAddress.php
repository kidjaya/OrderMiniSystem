<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserAddress
 *
 * @property-read \App\User $findUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress query()
 * @mixin \Eloquent
 */
class UserAddress extends Model
{
    //
    protected $fillable = [
        '*'
    ];

    public function findUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
