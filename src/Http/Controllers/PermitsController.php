<?php
namespace Rainsens\Adm\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Rainsens\Rbac\Models\Permit;
use Rainsens\Adm\Facades\AdmGrid;

class PermitsController extends MainController
{
	protected $title = 'Adm Grid Title';
	
	protected $description = 'Adm Grid Description';
	
	protected function grid()
	{
		$grid = AdmGrid::model(new Permit);
		
		$grid->column('id', 'ID');
		$grid->column('name', 'Name');
		$grid->column('slug', 'Slug');
		$grid->column('path', 'Path');
		$grid->column('method', 'Method');
		$grid->column('guard', 'Guard');
		
		$grid->query(function ($query) {
			/**
			 * @var Builder $query
			 */
			return $query->orderByDesc('id');
		});
		
		return $grid;
	}
	
	protected function show()
	{
	
	}
	
	protected function form()
	{
	
	}
}
