<?php
namespace Rainsens\Adm\Grid;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Rainsens\Adm\Contracts\Grid\Basic;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Adm\Contracts\Grid\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rainsens\Adm\Exceptions\InvalidArgumentException;

/**
 * Class GridBasic
 * @package Rainsens\Adm\Grid
 * @property $model
 * @property $title
 */
class GridBasic implements Basic
{
	protected $id;
	
	/**
	 * @var Builder|Model
	 */
	protected $model;
	
	protected $title;
	
	protected $description;
	
	protected static $initCallbacks = [];
	
	/**
	 * @var Collection
	 */
	protected $columns;
	
	public function __construct()
	{
		$this->setId();
		$this->setInitColumns();
		$this->runInitCallbacks();
	}
	
	/**
	 * Set grid id.
	 *
	 * @return Basic
	 */
	public function setId(): Basic
	{
		$this->id = uniqid('adm-grid-');
		return $this;
	}
	
	/**
	 * Set model for grid.
	 *
	 * @param Model $model
	 * @return Basic
	 */
	public function setModel(Model $model): Basic
	{
		$this->model = $model;
		return $this;
	}
	
	/**
	 * Set grid title.
	 *
	 * @param string $title
	 * @return Basic
	 */
	public function setTitle(string $title): Basic
	{
		$this->title = $title;
		return $this;
	}
	
	/**
	 * Set grid description.
	 *
	 * @param string $description
	 * @return Basic
	 */
	public function setDescription(string $description): Basic
	{
		$this->description = $description;
		return $this;
	}
	
	/**
	 * Columns expected to show
	 * set initial value as collection.
	 *
	 * @return Basic
	 */
	public function setInitColumns(): Basic
	{
		$this->columns = collect();
		return $this;
	}
	
	/**
	 * Push initial callback to grid from end user.
	 *
	 * @param Closure $callback
	 */
	public function init(Closure $callback): void
	{
		static::$initCallbacks[] = $callback;
	}
	
	/**
	 * Run initializations.
	 */
	public function runInitCallbacks(): void
	{
		$callbacks = static::$initCallbacks;
		
		if (empty($callbacks)) return;
		
		foreach ($callbacks as $callback) {
			call_user_func($callback, $this);
		}
	}
	
	public function getGridRoute(): string
	{
		return url(request()->getPathInfo());
	}
	
	/**
	 * Which column expected to show.
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 * @throws InvalidArgumentException
	 */
	public function column(string $name, string $label = ''): Column
	{
		if (Str::contains($name, '.')) {
			return $this->getRelationColumn($name, $label);
		}
		
		if (Str::contains($name, '->')) {
			return $this->getJsonColumn($name, $label);
		}
		
		return $this->getNormalColumn($name, $label);
	}
	
	/**
	 * Get general column for grid.
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function getNormalColumn(string $name, string $label = ''): Column
	{
		$columnInstance = app(Column::class)->name($name)->label($label);
		return tap($columnInstance, function ($column) {
			$this->columns->push($column);
		});
	}
	
	/**
	 * Get relation column for grid.
	 *
	 * Example: user.name
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 * @throws InvalidArgumentException
	 */
	public function getRelationColumn(string $name, string $label = ''): Column
	{
		list($relation, $column) = explode('.', $name);
		
		if (! method_exists($this->model, $relation) or ! $this->model->{$relation}() instanceof Relation) {
			$modelClass = get_class($this->model);
			throw new InvalidArgumentException("Call to undefined relationship '{$relation}' on model '{$modelClass}'");
		}
		
		$this->model->with($relation);
		
		$name = $name . '.' . $column;
		
		return $this->getNormalColumn($name, $label)->setRelation($relation, $column);
	}
	
	/**
	 * Get json column for grid.
	 *
	 * Example: user->name
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function getJsonColumn(string $name, string $label = ''): Column
	{
		$column = substr($name, strrpos($name, '->') + 2);
		$name = str_replace('->', '.', $name);
		return $this->getNormalColumn($name, $label ?: ucfirst($column));
	}
	
	/**
	 * Get properties.
	 *
	 * @param $name
	 * @return mixed
	 */
	public function __get($name)
	{
		return $this->$name ?? null;
	}
}
