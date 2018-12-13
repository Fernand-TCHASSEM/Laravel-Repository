<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Film::class, function (Faker $faker) {
    $name = $faker->unique()->sentence();
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->paragraph,
        'release_date' => $faker->date(),
        'rating' => $faker->randomElement([1, 2, 3, 4, 5]),
        'ticket_price' => $faker->randomNumber(2),
        'country' => $faker->country,
        'photo' => url('/').$faker->image(base_path('photos'))
    ];
});
