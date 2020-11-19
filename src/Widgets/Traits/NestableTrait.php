<?php
namespace Rainsens\Adm\Widgets\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait for being used model.
 *
 * $model->nestableData('order');
 *
 * Trait NestableTrait
 * @package Rainsens\Adm\Widgets\Traits
 */
trait NestableTrait
{
	public function scopeNestableData(Builder $builder, string $orderField)
	{
		return $builder->orderBy($orderField)->get();
	}
}
