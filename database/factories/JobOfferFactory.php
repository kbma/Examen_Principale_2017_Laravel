<?php

use Faker\Generator as Faker;

$factory->define(App\JobOffer::class, function (Faker $faker) {
    return [
        'Title' => $faker->text(20),
        'Description' => $faker->text(100),
        'Date' => $faker->date('Y-m-d',now()),
        'Skills' => $faker->text(10), // secret
        'company_id' => App\Company::all()->random()->id,
    ];
});
