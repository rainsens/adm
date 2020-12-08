<?php
namespace Rainsens\Adm\Http\Controllers;

use Rainsens\Adm\Grid\Action\Edit;
use Rainsens\Adm\Grid\Action\Show;
use Rainsens\Rbac\Models\Permit;
use Rainsens\Adm\Contracts\Grid\Grid;
use Illuminate\Database\Eloquent\Builder;

class PermitsController extends MainController
{
	protected $title = 'Adm Grid Title';
	
	protected $description = 'Adm Grid Description';
	
	protected function grid()
	{
		$grid = app(Grid::class, ['model' => new Permit]);
		
		$grid->column('id', 'ID');
		$grid->column('slug', '标记');
		$grid->column('path', 'Path');
		$grid->column('method', 'Method');
		$grid->column('guard', 'Guard');
		
		$grid->query(function ($query) {
			/**
			 * @var Builder $query
			 */
			return $query->orderByDesc('id');
		});
		
		$grid->action()->add(new Edit())->add(new Show());
		
		return $grid;
	}
	
	protected function show()
	{
	
	}
	
	protected function form()
	{
	
	}
}
