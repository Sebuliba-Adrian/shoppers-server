<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Models\Item::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->word,
        'price' => $faker->word,
        'quantity' => $faker->word,

    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->name,
        'email'    => $faker->unique()->email,
        'password' => password_hash('12345', PASSWORD_BCRYPT),
    ];
});
