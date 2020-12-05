<?php
namespace Rainsens\Adm\Facades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;

/**
 * Class AdmGrid
 * @package Rainsens\Adm\Facades
 * @method static \Rainsens\Adm\Grid\AdmGrid model(Model $model)
 */
class AdmGrid extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'adm-grid';
	}
}
