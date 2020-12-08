<?php
namespace Rainsens\Adm\Grid\Action;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Adm\Contracts\Grid\Actor;
use Rainsens\Adm\Contracts\Grid\Grid;

abstract class BaseActor implements Actor
{
	/**
	 * @var Grid
	 */
	protected $grid;
	
	/**
	 * @var Model|Builder
	 */
	protected $model;
	protected $route;
	
	protected $divide = false;
	
	public function setGrid(Grid $grid): Actor
	{
		$this->grid = $grid;
		$this->route = $this->grid->basic()->getGridRoute();
		return $this;
	}
	
	public function setRowModel(Model $rowModel): Actor
	{
		$this->model = $rowModel;
		return $this;
	}
	
	public function getKey()
	{
		return $this->model->getKey();
	}
	
	public function getGridRoute(): string
	{
		return $this->route;
	}
	
	abstract public function name(): string ;
	
	abstract public function href(): string ;
	
	public function handle(): void {}
	
	public function __get($name)
	{
		return $this->$name ?? null;
	}
}
