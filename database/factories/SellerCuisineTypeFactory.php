<?php

use Faker\Generator as Faker;

$factory->define(App\SellerCuisineType::class, function (Faker $faker) {
    return [
        //
        'seller_id'=>\App\Seller::all()->random()->id,
        'seller_type_name'=>$faker->name,
    ];
});
