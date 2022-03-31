<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});
