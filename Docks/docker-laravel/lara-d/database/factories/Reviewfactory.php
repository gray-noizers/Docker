<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'title'=>'海賊王に俺はなる',
        'body'=>'おすすめ',
        'image'=>'https://www.shonenjump.com/j/rensai/img/main_onepiece.jpg',
        'commic_title'=>'ワンピース'
    ];
});
