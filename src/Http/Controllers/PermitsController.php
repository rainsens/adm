<?php
namespace Rainsens\Adm\Http\Controllers;

use Rainsens\Adm\Facades\AdmGrid;
use Rainsens\Rbac\Models\Permit;

class PermitsController extends MainController
{
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
			return $query->orderBy('id', 'desc');
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
