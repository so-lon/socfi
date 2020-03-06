<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stadium;
use Faker\Generator as Faker;

$factory->define(Stadium::class, function (Faker $faker) {
    return [
        'name' => "San " . chr(rand(65, 90)),
        'opening_time' => '08:00:00',
        'closing_time' => '24:00:00',
        'status' => rand(0,2)
    ];
});
