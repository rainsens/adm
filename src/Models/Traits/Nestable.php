<?php
namespace Rainsens\Adm\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Nestable
{
	public function scopeNestableData(Builder $builder, string $orderField)
	{
		return $builder->orderBy($orderField)->get();
	}
}
