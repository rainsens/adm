<?php
namespace Rainsens\Adm\Grid\Traits;

use Rainsens\Adm\Contracts\Grid\Filter;
use Rainsens\Adm\Contracts\Grid\Grid;

trait InitGrid
{
	public function setDefaultId(): Grid
	{
		$this->id = uniqid('adm-grid-');
		return $this;
	}
	
	public function setDefaultRows(): Grid
	{
		$this->rows = collect();
		return $this;
	}
	
	public function setDefaultColumns(): Grid
	{
		$this->columns = collect();
		return $this;
	}
	
	public function callInitCallbacks(): void
	{
		$callbacks = static::$initCallbacks;
		
		if (empty($callbacks)) return;
		
		foreach ($callbacks as $callback) {
			call_user_func($callback, $this);
		}
	}
	
	public function runInit(): void
	{
		$this->filter = app(Filter::class);
		
		$this->setDefaultId();
		$this->setDefaultRows();
		$this->setDefaultColumns();
		
		static::callInitCallbacks();
	}
}
