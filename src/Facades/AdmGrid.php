<?php
namespace Rainsens\Adm\Facades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;
use Rainsens\Adm\Grid\GridBasic;
use Rainsens\Adm\Grid\GridFilter;
use Rainsens\Adm\Grid\GridRender;
use Rainsens\Adm\Grid\GridTool;

/**
 * Class AdmGrid
 * @package Rainsens\Adm\Facades
 * @method static \Rainsens\Adm\Grid\AdmGrid model(Model $model)
 * @method static GridBasic basic()
 * @method static GridFilter filter()
 * @method static GridTool tool()
 * @method static GridRender render()
 */
class AdmGrid extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'adm-grid';
	}
}
