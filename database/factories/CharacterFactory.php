<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Character;
use Faker\Generator as Faker;

$factory->define(Character::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'str' => $faker->numberBetween(0,20),
    ];
});
