<?php
namespace Rainsens\Adm\Facades;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Facade;
use Rainsens\Adm\Support\Guard;

/**
 * Class Adm
 * @package Rainsens\Adm\Facades
 * @method static Guard guard()
 * @method static Authorizable user()
 */
class Adm extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'adm';
	}
}
