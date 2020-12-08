<?php
namespace Rainsens\Adm\Grid;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Rainsens\Adm\Contracts\Grid\Action;
use Rainsens\Adm\Contracts\Grid\Actor;
use Rainsens\Adm\Contracts\Grid\Grid;

class GridAction implements Action
{
	protected $grid;
	
	/**
	 * @var Collection
	 */
	protected $actions;
	
	public function __construct(Grid $grid)
	{
		$this->grid = $grid;
		$this->actions = collect();
	}
	
	public function add(Actor $actor): Action
	{
		$actor->setGrid($this->grid);
		$this->actions->push($actor);
		
		return $this;
	}
	
	public function get(): Collection
	{
		return $this->actions;
	}
	
	public function push($gridItems)
	{
		foreach ($gridItems as $item) {
			$actions = [];
			foreach ($this->actions as $action) {
				$actions[] = $action->setRowModel($item);
			}
			$item['actions'] = $actions;
		}
		
		return $gridItems;
	}
}
