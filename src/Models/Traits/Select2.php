<?php
namespace Rainsens\Adm\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Select2
{
	public function scopeSelect2Data(Builder $builder, string $textField)
	{
		return select2data($builder->get(), $textField);
	}
}
