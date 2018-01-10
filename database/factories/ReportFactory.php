<?php

use Faker\Generator as Faker;
use App\Models\Report;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'rp_date' => $faker->date,
        'rp_time_from' => $faker->date('H:i', rand(1, 54000)),
        'rp_time_to' => $faker->date('H:i', rand(1, 54000)),
        'rp_content' => "jQueryでAjax通信を行い、非同期的でリッチなコンテンツを提供するようにした。",
        'rp_created_at' => $faker->date,
        'reportcate_id' => $faker->numberBetween(1,5),
        'user_id' => 1,
    ];
});
