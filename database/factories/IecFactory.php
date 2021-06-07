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

$factory->define(App\Models\SlaveModel::class, function (fakers $faker) {
    return [
        'ID_VARIABLE' => $faker->randomNumber(5), 
        'ID_SLAVE' => '3',
        'ID_SLOT' => $faker->randomNumber(1),
        'ADDRESS' => str_random(10),
        'VARIABLE_NAME' =>str_random(10),
        'TYPE' => 'REAL',
        'ACCESS' => '0',
        'VALUE' => '0',
    ];
});
