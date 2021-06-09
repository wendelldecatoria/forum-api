<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use App\Models\Message;
use App\Models\Topic;
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
$factory->define(Message::class, function (Faker $faker) {
    return [
        'topic_id'          => factory(Topic::class)->create()->id,
        'parent_id'         => $faker->unique()->numberBetween(1, 20),
        'body'              => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'is_highlight'      => $faker->boolean(50),
        'user_id'           => factory(User::class)->create()->id
    ];
});
