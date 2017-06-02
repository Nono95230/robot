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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Robot::class, function (Faker\Generator $faker) {

    $names = [
            'Alan',
            'Albert',
            'RDX',
            'Anthony-R',
            'Ben-RD',
            'RD2',
            'J-RD'
    ];

    $tab = ["published", "unpublished"];

    $alea = (mt_rand() / mt_getrandmax());

    $title = $names[array_rand($names)];
    $userIdTab = [1,2];
    return [
            'name'         => $faker->firstName(),
            'category_id'  => ($alea < 0.66) ? rand(1, 3) : NULL,
            'user_id'      => $userIdTab[array_rand($userIdTab, 1)],
            'slug'         => str_slug($title),
            'description'  => $faker->paragraph(rand(5, 20)),
           /* 'published_at' => $faker->dateTime(),*/
            'status'       => $tab[array_rand($tab, 1)]
    ];
});