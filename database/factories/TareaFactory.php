<?php

namespace Database\Factories;
use App\Models\Tarea;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


    $factory->define(Tarea::class, function (Faker $faker) {
        return [
            'nombre' => $faker->sentence,
            'descripcion' => $faker->paragraph,
        ];
    });

