<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'name' => 'San ' . rand(1, 5),
        'opening_time' => '08:00:00',
        'closing_time' => '24:00:00',
        'type' => array_rand([5, 7]),
    ];
});
