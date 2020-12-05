<?php
namespace Rainsens\Adm\Grid;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Rainsens\Adm\Contracts\Grid\Grid;
use Rainsens\Adm\Contracts\Grid\Column;
use Rainsens\Adm\Contracts\Grid\Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Rainsens\Adm\Grid\Traits\AddColumn;
use Rainsens\Adm\Grid\Traits\InitGrid;

class AdmGrid implements Grid
{
	use InitGrid,
		AddColumn;
	
	protected $id;
	
	protected $title = 'Adm Title';
	
	protected $description = 'Adm Description';
	
	/**
	 * @var Model|Builder
	 */
	protected $model;
	
	/**
	 * @var Filter
	 */
	protected $filter;
	
	/**
	 * @var Collection
	 */
	protected $rows;
	
	/**
	 * @var Collection
	 */
	protected $columns;
	
	/**
	 * @var array
	 */
	protected static $initCallbacks = [];
	
	
	public function __construct()
	{
		$this->runInit();
	}
	
	public function title()
	{
		return $this->title;
	}
	
	public function description()
	{
		return $this->description;
	}
	
	/**
	 * @param Model $model
	 * @return Grid
	 */
	public function model(Model $model): Grid
	{
		$this->model = $model;
		return $this;
	}
	
	public function column($name, string $label = ''): Column
	{
		if (Str::contains($name, '.')) {
			return $this->addRelationColumn($name, $label);
		}
		
		if (Str::contains($name, '->')) {
			return $this->addJsonColumn($name, $label);
		}
		
		return $this->addNormalColumn($name, $label);
	}
	
	/**
	 * Setting builder from end user.
	 * @param Closure $builder
	 */
	public function query(Closure $builder): void
	{
		$this->filter->setModel($this->model)->setBuilder($builder);
	}
	
	public function items()
	{
		return $this->filter->paginate() ?? $this->filter->get();
	}
	
	public function render(): View
	{
		return view('adm::pages.grid', [
			'title' => $this->title,
			'description' => $this->description,
			'items' => $this->items()
		]);
	}
}
