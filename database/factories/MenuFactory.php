<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Rainsens\Adm\Models\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
	    'parent_id' => 0,
	    'order' => 1,
	    'name' => 'Menu',
	    'icon' => 'fa-tasks',
	    'url' => '/'
    ];
});
