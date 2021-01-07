<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Alumno;
use Faker\Generator as Faker;

$factory->define(Alumno::class, function (Faker $faker) {

    $data =  [
        'nombres' => $faker->firstname,
        'apellido' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'DNI' => $faker->unique()->randomNumber(8),
        'password' => '$2y$10$NInxa5stxWbz59uzk94gyufv5CfkrcjvEmGrI4b2WsTwWRhICjlhe'
    ];

    return $data;

});
