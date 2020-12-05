<?php
namespace Rainsens\Adm\Contracts\Grid;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Rainsens\Adm\Grid\Filter\GridFilter;

/**
 * Interface Filter
 * @package Rainsens\Adm\Contracts\Grid
 *
 * @see GridFilter
 */
interface Filter
{
	public function setModel(Model $model): self ;
	public function setBuilder(Closure $builder): self ;
	public function getBuilder();
	public function paginate(int $size = 15);
	public function get();
}
