<?php

namespace Rainsens\Adm\Models;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rainsens\Rbac\Traits\RbacTrait;

class AdmUser extends Authenticatable
{
	use Notifiable;
	use RbacTrait;
	
	protected $fillable = [
		'name', 'password', 'nickname', 'avatar'
	];
	
	protected $hidden = [
		'password', 'remember_token',
	];
	
	public function can($abilities, $arguments = [])
	{
		return app(Gate::class)->forUser($this)->check($abilities, $arguments);
	}
	
	/**
	 * Determine if the entity does not have the given abilities.
	 *
	 * @param  iterable|string  $abilities
	 * @param  array|mixed  $arguments
	 * @return bool
	 */
	public function cant($abilities, $arguments = [])
	{
		return ! $this->can($abilities, $arguments);
	}
	
	/**
	 * Determine if the entity does not have the given abilities.
	 *
	 * @param  iterable|string  $abilities
	 * @param  array|mixed  $arguments
	 * @return bool
	 */
	public function cannot($abilities, $arguments = [])
	{
		return $this->cant($abilities, $arguments);
	}
}
