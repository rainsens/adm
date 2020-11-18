<?php

return [
	'name' => 'Adm',
	
	'logo' => '<b>Rainsen</b> Adm',
	
	'logo-mini' => '<b>ADM</b>',
	
	'title' => 'Rainsen - Adm',
	
	'auth' => [
		'model' => 'App\\Models\\User',
		'fields' => [
			'account' => 'name',        // name field in table
			'password' => 'password',   // password field in table
			'identity' => 'authkind',   // identity field in table
		],
	]
];
