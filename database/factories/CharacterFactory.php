<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Character;
use Faker\Generator as Faker;

use App\User;

$factory->define(Character::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'str' => $faker->numberBetween(0, 20),
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
    ];
});
