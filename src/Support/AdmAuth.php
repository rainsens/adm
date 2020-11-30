<?php
namespace Rainsens\Adm\Support;

use Illuminate\Contracts\Auth\Factory as AuthFactory;

class AdmAuth
{
	protected $guard;
	
	public function __construct()
	{
		$this->guard = config('adm.auth.guard', 'adm');
	}
	
	/**
	 * @param null $guard
	 * @return \Illuminate\Contracts\Auth\Guard
	 */
	public function guard($guard = null)
	{
		if (is_null($guard)) {
			return app(AuthFactory::class)->guard($this->guard);
		}
		return app(AuthFactory::class)->guard($guard);
	}
	
	public function user()
	{
		return $this->guard()->user();
	}
	
	public function guest()
	{
		return $this->guard()->guest();
	}
	
	public function guardName()
	{
		return $this->guard;
	}
}
