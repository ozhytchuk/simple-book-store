<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\BooksTags;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(BooksTags::class, function (Faker $faker) {
    return [
        'book_id' => $faker->unique()->numberBetween(1, 50),
        'tag_id' => $faker->numberBetween(1, 20),
    ];
});
