<?php
namespace Rainsens\Adm\Grid;

use Closure;
use Rainsens\Adm\Contracts\Grid\Grid;
use Illuminate\Database\Eloquent\Builder;
use Rainsens\Adm\Contracts\Grid\Filter;

class GridFilter implements Filter
{
	/**
	 * @var Grid;
	 */
	protected $grid;
	
	protected $builder;
	
	public function __construct(Grid $grid)
	{
		$this->grid = $grid;
	}
	
	public function setBuilder(Closure $builder): Filter
	{
		$this->builder = $builder;
		return $this;
	}
	
	public function getBuilder(): Builder
	{
		return call_user_func($this->builder, $this->grid->basic()->model);
	}
	
	public function paginate(int $size = 15)
	{
		if ($this->getBuilder() instanceof Builder) {
			return $this->getBuilder()->paginate($size);
		}
		return $this->getBuilder();
	}
	
	public function get()
	{
		if ($this->getBuilder() instanceof Builder) {
			return $this->getBuilder()->get();
		}
		return $this->getBuilder();
	}
	
	public function prepend(string $html): void
	{
	
	}
	
	public function append(string $html): void
	{
	
	}
	
	public function render()
	{
	
	}
}
