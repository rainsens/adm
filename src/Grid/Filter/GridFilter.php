<?php
namespace Rainsens\Adm\Grid\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Adm\Contracts\Grid\Filter;

class GridFilter implements Filter
{
	/**
	 * @var Model|Builder
	 */
	protected $model;
	
	protected $builder;
	
	public function setModel(Model $model): Filter
	{
		$this->model = $model;
		return $this;
	}
	
	public function setBuilder(Closure $builder): Filter
	{
		$this->builder = $builder;
		return $this;
	}
	
	public function getBuilder()
	{
		return call_user_func($this->builder, $this->model);
	}
	
	public function paginate()
	{
		if ($this->getBuilder() instanceof Builder) {
			return $this->getBuilder()->paginate();
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
}
