<?php

namespace Rainsens\Adm\Models;

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
}
