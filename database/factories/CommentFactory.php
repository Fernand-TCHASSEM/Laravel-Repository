<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    $user = App\Models\User::random();

    $film = factory(App\Models\Film::class)->create();

    $genre = App\Models\Genre::random();
    $film->genres()->attach($genre->id);

    return [
        'content' => $faker->paragraph,
        'user_id' => $user->id,
        'film_id' => $film->id
    ];
});
