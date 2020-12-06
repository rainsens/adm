<?php
namespace Rainsens\Adm\Grid;

use Illuminate\Support\Collection;
use Rainsens\Adm\Contracts\Grid\Grid;
use Rainsens\Adm\Contracts\Grid\Tool;
use Rainsens\Adm\Widgets\Button\Button;

class GridTool implements Tool
{
	protected $grid;
	
	/**
	 * @var Collection
	 */
	protected $tools;
	
	/**
	 * @var Button
	 */
	protected $button;
	
	protected $options = [
		'show_create_button' => true
	];
	
	public function __construct(Grid $grid)
	{
		$this->grid = $grid;
		
		$this->button = app(Button::class);
		
		$this->tools = collect();
		$this->tools->push($this->createButton());
		$this->tools->push($this->refreshButton());
	}
	
	public function prepend(string $element = ''): Tool
	{
		$this->tools->push($element);
		return $this;
	}
	
	public function append(string $element = ''): Tool
	{
		$this->tools->push($element);
		return $this;
	}
	
	public function getGridRoute()
	{
		return url(request()->getPathInfo());
	}
	
	public function getCreateRoute(): string
	{
		return sprintf('%s/create', $this->getGridRoute());
	}
	
	public function createButton()
	{
		return $this->button
			->href($this->getCreateRoute())
			->color('btn-system')
			->icon('fa fa-plus')
			->text('新增')
			->normalBtn();
	}
	
	public function refreshButton()
	{
		return $this->button
			->href($this->getGridRoute())
			->color('btn-info')
			->icon('fa fa-refresh')
			->text('刷新')
			->normalBtn();
	}
	
	public function render()
	{
		return $this->tools;
	}
}
