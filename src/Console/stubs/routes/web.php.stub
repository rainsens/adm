<?php

use Illuminate\Support\Facades\Route;

Adm::routes();

Route::prefix(config('adm.route.prefix'))
	->namespace(config('adm.route.namespace'))
	->middleware(config('adm.route.middleware'))
	->name(config('adm.route.prefix').'.')
	->group(function () {
		
		Route::get('/', 'HomeController@index')->name('home');
		
	});

