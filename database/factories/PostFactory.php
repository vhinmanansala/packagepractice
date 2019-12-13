<?php

use AlvinManansala\PackagePractice\Models\Post;
use AlvinManansala\PackagePractice\Tests\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Log;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Post::class, function (Faker $faker) {
    $author = factory(User::class)->create();

    return [
        'title' => implode(" ", $faker->words(3)),
        'body' => $faker->paragraph,
        'author_id' => $author->id,
        'author_type' => get_class($author),
    ];
});