<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Genre::class, function (Faker $faker) {
    return [
        'label' => $faker->word
    ];
});
