<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Faker\Generator as fakers;

$factory->define(App\Models\SnmpDriverModel::class, function (fakers $faker) {
    return [
        'CONFIG_ITEM' => $faker->word,
        'VALUE' => $faker->randomNumber(4),
    ];
});
