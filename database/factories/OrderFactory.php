<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'user_id'=>\App\User::all()->random()->id,
        'seller_id'=>\App\Seller::all()->random()->id,
        'order_num'=>$faker->uuid,
        'distribution'=>rand(0,1),
        'address'=>$faker->address,
        'name'=>$faker->name,
        'gender'=>array_rand([0,1]),
        'phone'=>$faker->phoneNumber,
        'order_price'=>'un_calculate',//加邮费额外费用
        'goods_price'=>'un_calculate',
        'freight'=>'1',
        'zp_integral'=>'un_cal',
        'order_state'=>rand(0,5),
        'update_by'=>'root',
    ];
});
