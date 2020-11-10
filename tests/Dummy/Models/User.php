<?php
namespace Rainsens\Adm\Tests\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthorizableContract, AuthenticatableContract
{
	use Authorizable, Authenticatable, Notifiable;
	
	protected $guarded = [];
	
	protected $table = 'users';
}
