<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use App\Models\Topic;
use App\Models\Section;
use App\Models\User;

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

/**
 * @var Factory $factory
 */
$factory->define(Topic::class, function (Faker $faker) {
    return [
        'section_id'    => factory(Section::class)->create()->id,
        'title'         => $faker->word,
        'body'          => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'user_id'       => factory(User::class)->create()->id
    ];
});
