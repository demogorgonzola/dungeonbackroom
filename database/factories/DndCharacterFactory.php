<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DndCharacter;
use Faker\Generator as Faker;

$factory->define(DndCharacter::class, function (Faker $faker) {
    $classes = [
        'Artificer',
        'Barbarian',
        'Bard',
        'Cleric',
        'Druid',
        'Fighter',
        'Monk',
        'Paladin',
        'Ranger',
        'Rogue',
        'Sorcerer',
        'Warlock',
        'Wizard',
    ];

    return [
        'name' => $faker->name,
        'level' => $faker->numberBetween(1,20),
        'class' => $faker->randomElement($classes),
    ];
});
