<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Profesor::class, function (Faker $faker) {
    $data =  [
        'nombres' => $faker->firstname,
        'apellido' =>$faker->lastname,  
    ];

    return $data ;
});
