<?php

use Faker\Generator as Faker;

use App\Registration;

$factory->define(Registration::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'student_id' => rand(1, 500),
        'room_id' => rand(1, 5),
    ];
});
