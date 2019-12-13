<?php

use AlvinManansala\PackagePractice\Models\Post;
use AlvinManansala\PackagePractice\Tests\User;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => "$faker->firstNameMale $faker->lastName",
        'email' => $faker->email,
        'password' => bcrypt('password')
    ];
});