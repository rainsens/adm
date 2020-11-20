<?php

namespace Rainsens\Adm\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdmUser extends Authenticatable
{
	protected $fillable = [
		'name', 'password', 'nickname', 'avatar'
	];
	
	protected $hidden = [
		'password', 'remember_token',
	];
}
