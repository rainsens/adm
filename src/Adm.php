<?php
namespace Rainsens\Adm;

class Adm
{
	const VERSION = '1.0.0';
	
	
	public function routes()
	{
		$attributes = [
			'prefix' => config('adm.route.prefix'),
			'middleware'
		];
		
		
	}

}
