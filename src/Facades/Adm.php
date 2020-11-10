<?php
namespace Rainsens\Adm\Facades;

use Illuminate\Support\Facades\Facade;

class Adm extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'adm';
	}
}
