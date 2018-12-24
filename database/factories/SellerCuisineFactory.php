<?php

use Faker\Generator as Faker;

$factory->define(App\SellerCuisine::class, function (Faker $faker) {
    return [
        'seller_id'=>\App\Seller::all()->random()->id,
        'type_id'=>rand(1,10),
        'cuisine_name'=>$faker->name,
        'cuisine_pic'=>$faker->imageUrl(100, 100),
        'cuisine_dec'=>$faker->numberBetween(10,999),
        'cuisine_body'=>$faker->sentence,
        'cuisine_stock'=>rand(0,999),
        'cuisine_ori_price'=>$faker->numberBetween(25,68),
        'cuisine_price'=>$faker->numberBetween(12,25),
        'has_sku'=>rand(0,1),
        'cuisine_state'=>rand(0,1),
        'cuisine_month_sales'=>rand(0,999),
        'update_by'=>'root',
    ];
});
