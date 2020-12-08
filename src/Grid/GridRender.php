<?php
namespace Rainsens\Adm\Grid;

use Rainsens\Adm\Contracts\Grid\Grid;
use Illuminate\Contracts\View\View;
use Rainsens\Adm\Contracts\Grid\Render;

class GridRender implements Render
{
	protected $grid;
	
	protected $view = 'adm::pages.grid';
	
	public function __construct(Grid $grid)
	{
		$this->grid = $grid;
	}
	
	public function response(): View
	{
		$filters        = $this->grid->filter()->render();
		$tools          = $this->grid->tool()->render();
		$title          = $this->grid->basic()->title;
		$description    = $this->grid->basic()->description;
		$columns        = $this->grid->basic()->columns;
		$items          = $this->grid->filter()->paginate();
		
		return view($this->view, [
			'filters'       => $filters,
			'tools'         => $tools,
			'title'         => $title,
			'description'   => $description,
			'columns'       => $columns,
			'items'         => $items,
		]);
	}
}
