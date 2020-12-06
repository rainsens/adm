<?php
namespace Rainsens\Adm\Grid;

use Rainsens\Adm\Contracts\Grid\Grid;
use Rainsens\Adm\Contracts\Grid\Column;

/**
 * A single column of a grid.
 *
 * Class GridColumn
 * @package Rainsens\Adm\Grid\Column
 */
class GridColumn implements Column
{
	/**
	 * @var Grid
	 */
	protected $grid;
	
	protected $columns;
	
	protected $name;
	
	protected $label;
	
	protected $relation;
	
	protected $relationColumn;
	
	public function __construct()
	{
		$this->grid = app(Grid::class);
	}
	
	public function name(string $name): Column
	{
		$this->name = $name;
		return $this;
	}
	
	public function label(string $label = ''): Column
	{
		$this->label = $label ?? ucfirst(str_replace(['.', '_'], '', $label));
		return $this;
	}
	
	public function setRelation(string $relation, string $column = null): Column
	{
		$this->relation = $relation;
		$this->relationColumn = $column;
		
		return $this;
	}
	
	public function __get($name)
	{
		return $this->$name ?? null;
	}
}
