<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ProfessionModel2::class, function (Faker $faker) {
    return [
  		'profession' => $faker ->sentence(3,false),
    ];
});
