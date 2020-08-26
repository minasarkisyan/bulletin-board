<?php

/** @var Factory $factory */

use App\Models\Region;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Region::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->city,
        'slug' => $faker->unique()->slug(2),
        'parent_id' => null
    ];
});
