<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Item;
use Faker\Generator as Faker;
use App\Character;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'weight' => $faker->randomFloat(2, 0.1, 20.0),
        'character_id' => function () {
            return factory(Character::class)->create()->id;
        }
    ];
});
