<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
//use App\Book;
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

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->text(75),
        'author' => $faker->name(),
        'description' => $faker->text(2500),
        'poster' => $faker->imageUrl(),
        'url' => $faker->url,
        'price' => $faker->randomFloat(2, 1, 50),
        'book_date' => $faker->dateTime('now', null),
    ];
});
