<?php

use Faker\Generator as Faker;

$factory->define(App\UserAddress::class, function (Faker $faker) {
    return [
        'user_id'=>\App\User::all()->random()->id,
        'phone'=>$faker->phoneNumber,
        'name'=>$faker->name,
        'address'=>$faker->address,
        'address_dec'=>$faker->sentence,
    ];
});
