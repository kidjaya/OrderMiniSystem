<?php

use Faker\Generator as Faker;

$factory->define(App\Seller::class, function (Faker $faker) {
    return [
        //
        'seller_type'=>array_random(['0','1' ,'2','3','4']),
        'seller_logo'=>$faker->imageUrl(50, 50),
        'seller_name'=>$faker->company,
        'seller_des'=>$faker->sentence,
        'seller_lowest_price'=>rand(8,20),
        'deliver_time'=>rand(15,45).'分钟',
        'seller_time'=>$faker->time($format = 'H:i:s', $max = 'now'),
        'seller_grade'=>rand(1,5),
        'seller_address'=>$faker->address,
        'seller_month_sales'=>rand(1,1000),
        'seller_status'=>rand(0,1),
        'update_by'=>'root',
    ];
});
