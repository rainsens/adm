<?php
namespace Rainsens\Adm\Grid;

use Closure;
use Illuminate\Support\Collection;
use Rainsens\Adm\Contracts\Grid\Column;

/**
 * A single column of a grid.
 *
 * Class GridColumn
 * @package Rainsens\Adm\Grid\Column
 */
class GridColumn implements Column
{
	protected $columns;
	
	protected $name;
	
	protected $label;
	
	protected $relation;
	
	protected $relationColumn;
	
	/**
	 * Columns customized to show.
	 *
	 * @var Collection
	 */
	protected $wantClosures;
	
	public static $plugins = [
		'editing'       => '',
		'switch'        => ''
	];
	
	public function __construct()
	{
		$this->wantClosures = collect();
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
	
	public function want(Closure $closure)
	{
		$this->wantClosures->push($closure);
		return $this;
	}
	
	public function __get($name)
	{
		return $this->$name ?? null;
	}
	
	public function callBuiltinPlugin()
	{
	
	}
	
	public function callSupportedPlugin()
	{
	
	}
}
