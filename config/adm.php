<?php

return [
	'name' => 'Adm',
	
	'logo' => '<b>ADM</b> Administration',
	
	'logo-mini' => '<b>ADM</b>',
	
	'title' => 'Administration - Adm',
	
	'auth' => [
		'model' => 'App\\Models\\User',
		'fields' => [
			'account' => 'name',        // name field in table
			'password' => 'password',   // password field in table
			'identity' => 'authkind',   // identity field in table
		],
	]
];
