<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 09/04/2016
 * Time: 20:45
 */

$factory->define(App\Event::class, function (Faker\Generator $faker) {

    return [
        'lat' => $faker->latitude(40.600281, 42.005570),
        'lng' => $faker->longitude(-8.237015, -7.905505),
        'occurrence_id' => $faker->numberBetween(1, 10),
        'local_id' => $faker->numberBetween(1, 4),
        'address' => $faker->address,
        'user_id' => 1,
        'obs' => $faker->realText(200)
    ];
});