<?php
namespace Rainsens\Adm\Grid\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Adm\Contracts\Grid\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rainsens\Adm\Exceptions\InvalidArgumentException;

/**
 * Add expected columns to current Grid.
 *
 * Trait AddColumn
 * @package Rainsens\Adm\Grid\Traits
 * @property Model|Builder $model
 * @property Collection $columns
 */
trait AddColumn
{
	public function addNormalColumn(string $name, string $label = ''): Column
	{
		$column = app(Column::class)->grid($this)->name($name)->label($label);
		
		return tap($column, function ($value) {
			$this->columns->push($value);
		});
	}
	
	public function addRelationColumn(string $name, string $label = ''): Column
	{
		list($relation, $column) = explode('.', $name);
		$model = $this->model;
		
		if (! method_exists($model, $relation) || !$model->{$relation}() instanceof Relation) {
			$class = get_class($model);
			throw new InvalidArgumentException("Call to undefined relationship '{$relation}' on model '{$class}'.");
		}
		
		$name = $name . '.' . $column;
		$this->model->with($relation);
		return $this->addNormalColumn($name, $label)->setRelation($relation, $column);
	}
	
	public function addJsonColumn(string $name, string $label = ''): Column
	{
		$column = substr($name, strrpos($name, '->') + 2);
		$name = str_replace('->', '.', $name);
		return $this->addNormalColumn($name, $label ?: ucfirst($column));
	}
}
