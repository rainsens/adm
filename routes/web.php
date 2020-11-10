<?php

Adm::routes();

Route::group([
	'prefix'        => config('adm.route.prefix'),
	'namespace'     => config('adm.route.namespace'),
	'middleware'    => config('adm.route.middleware'),
], function () {
	
	Route::get('/', 'HomeController@index')->name('home');
	
});
