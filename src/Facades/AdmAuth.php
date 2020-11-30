<?php
namespace Rainsens\Adm\Facades;

use Rainsens\Adm\Models\AdmUser;
use Illuminate\Support\Facades\Facade;

/**
 * Class AdmAuth
 * @package Rainsens\Adm\Facades
 * @method static \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard guard()
 * @method static \Illuminate\Contracts\Auth\Guard user()
 * @method static \Illuminate\Contracts\Auth\Guard guest()
 * @method static \Illuminate\Contracts\Auth\Guard guardName()
 */
class AdmAuth extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'admauth';
	}
}
