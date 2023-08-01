<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->name, 
        'telefone' => $faker->unique()->tollFreePhoneNumber,
        'email' => $faker->unique()->email, 
        'motivo_contatos_id' => $faker->numberBetween(1, 3), 
        'mensagem' => $faker->unique()-> text (150)
    ];
});
