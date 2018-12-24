<?php

use Faker\Generator as Faker;

$factory->define(App\OrderDetail::class, function (Faker $faker) {
    return [
        'order_id'=>\App\Order::all()->random()->id,
        'goods_id'=>\App\SellerCuisine::all()->random()->id,
        'good_num'=>rand(1,10),
        'goods_price'=>rand(12,24),
        'goods_all_price'=>'un_cal',
        'goods_ sku'=>\App\SellerCuisineScale::all()->random()->sku_name,
        'zp_integral'=>'un_cal',
        'update_by'=>'root',
    ];
});
