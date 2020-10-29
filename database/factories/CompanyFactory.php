<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'Name' => $faker->company,
        'Adress' => $faker->address,

    ];
});
