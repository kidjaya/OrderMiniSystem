<?php

use Faker\Generator as Faker;

$factory->define(App\SellerCuisineScale::class, function (Faker $faker) {
    return [
        'cuisine_id'=>\App\SellerCuisine::all()->where('has_sku','=','1')->random()->id,
        'sku_name'=>$faker->name,
        'sku_ori_price'=>rand(25,68),
        'sku_price'=>rand(12,25),
        'update_by'=>'root',
    ];
});
