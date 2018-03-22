<?php

use Faker\Generator as Faker;

use App\Student;

$factory->define(Student::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);

    return [
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->lastName,
        'gender' => $gender == 'male' ? 'M' : 'F',
        'email' => $faker->unique()->safeEmail,
        'cpf' => $faker->cpf,
    ];
});
