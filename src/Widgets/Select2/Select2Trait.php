<?php
namespace Rainsens\Adm\Widgets\Select2;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait for being used model.
 *
 * $model->select2Data('name');
 *
 * Trait Select2Trait
 * @package Rainsens\Adm\Widgets\Traits
 */
trait Select2Trait
{
	public function scopeSelect2Data(Builder $builder, string $textField)
	{
		return app(Select2::class)->select2data($builder->get(), $textField);
	}
}
