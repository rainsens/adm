<?php
namespace Rainsens\Adm\Contracts\Grid;

use Closure;
use Illuminate\Database\Eloquent\Model;

interface Grid
{
	/**
	 * Set grid model.
	 *
	 * @param Model $model
	 * @return Grid
	 */
	public function model(Model $model): self ;
	
	/**
	 * Get the grid basic infomation.
	 *
	 * @return Basic
	 */
	public function basic(): Basic ;
	
	/**
	 * Get the grid filter.
	 *
	 * @return Filter
	 */
	public function filter(): Filter ;
	
	/**
	 * Get the grid tool.
	 *
	 * @return Tool
	 */
	public function tool(): Tool ;
	
	/**
	 * Render current grid.
	 *
	 * @return Render
	 */
	public function render(): Render;
	
	/**
	 * Push initial callback to grid from end user.
	 *
	 * @param Closure $fallback
	 * @return Grid
	 */
	public function init(Closure $fallback): self ;
	
	public function title(string $title): self ;
	
	public function description(string $description): self ;
	
	/**
	 * Which columns expected to display.
	 *
	 * @param $name
	 * @param string $label
	 * @return Column
	 */
	public function column(string $name, string $label = ''): Column ;
	
	/**
	 * Query builder from end user.
	 *
	 * @param Closure $builder
	 * @return Grid
	 */
	public function query(Closure $builder): self ;
}
