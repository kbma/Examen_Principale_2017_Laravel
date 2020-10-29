<?php

use Faker\Generator as Faker;

$factory->define(App\JobOfferUser::class, function (Faker $faker) {
    return [
        'joboffer_id' => App\JobOffer::all()->random()->id,
        'user_id' => App\User::all()->random()->id,


    ];
});
