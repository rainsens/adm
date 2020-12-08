<?php
namespace Rainsens\Adm\Grid;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Adm\Contracts\Grid\Action;
use Rainsens\Adm\Contracts\Grid\Basic;
use Rainsens\Adm\Contracts\Grid\Column;
use Rainsens\Adm\Contracts\Grid\Grid;
use Rainsens\Adm\Contracts\Grid\Filter;
use Rainsens\Adm\Contracts\Grid\Render;
use Rainsens\Adm\Contracts\Grid\Tool;

class AdmGrid implements Grid
{
	/**
	 * @var Basic
	 */
	protected $basic;
	
	/**
	 * @var Filter
	 */
	protected $filter;
	
	/**
	 * @var Tool
	 */
	protected $tool;
	
	/**
	 * @var Action
	 */
	protected $action;
	
	/**
	 * @var Render
	 */
	protected $render;
	
	
	public function __construct(Model $model)
	{
		$this->basic = app(Basic::class);
		$this->basic->setModel($model);
		
		$this->filter = app(Filter::class, ['grid' => $this]);
		$this->tool = app(Tool::class, ['grid' => $this]);
		$this->action = app(Action::class, ['grid' => $this]);
		$this->render = app(Render::class, ['grid' => $this]);
	}
	
	public function basic(): Basic
	{
		return $this->basic;
	}
	
	public function filter(): Filter
	{
		return $this->filter;
	}
	
	public function tool(): Tool
	{
		return $this->tool;
	}
	
	public function action(): Action
	{
		return $this->action;
	}
	
	public function render(): Render
	{
		return $this->render;
	}
	
	public function title(string $title): Grid
	{
		$this->basic->setTitle($title);
		return $this;
	}
	
	public function description(string $description): Grid
	{
		$this->basic->setDescription($description);
		return $this;
	}
	
	/**
	 * Push initial callback to grid from end user.
	 *
	 * @param Closure $callback
	 * @return Grid
	 */
	public function init(Closure $callback): Grid
	{
		$this->basic->init($callback);
		return $this;
	}
	
	/**
	 * Which column expected to show.
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function column(string $name, string $label = ''): Column
	{
		return $this->basic->column($name, $label);
	}
	
	/**
	 * Setting builder from end user.
	 *
	 * @param Closure $builder
	 * @return Grid
	 */
	public function query(Closure $builder): Grid
	{
		$this->filter->setBuilder($builder);
		return $this;
	}
}
