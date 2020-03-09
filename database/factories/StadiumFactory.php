<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Stadium::class, function (Faker $faker) {
    return [
        'name'         => "San " . chr(rand(65, 90)),
        'avatar'       => 'argon/img/bgs/bg-1.jpg',
        'address'      => $faker->address,
        'opening_time' => '08:00',
        'closing_time' => '24:00',
        'status'       => rand(0,1)
    ];
});
