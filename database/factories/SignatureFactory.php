<?php

use Faker\Generator as Faker;
use App\Signature;

$factory->define(Signature::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'body' => $faker->sentence
    ];
});
