<?php
namespace Rainsens\Adm\Contracts\Grid;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface Grid
{
	/**
	 * -----------------------------------------------------------------------------------------------------------------
	 * Grid Initialization.
	 * -----------------------------------------------------------------------------------------------------------------
	 */
	
	public function setDefaultId(): self ;
	
	public function setDefaultRows(): self ;
	
	public function setDefaultColumns(): self ;
	
	public function callInitCallbacks(): void ;
	
	public function runInit(): void ;
	
	
	
	/**
	 * -----------------------------------------------------------------------------------------------------------------
	 * Grid adding necessary columns.
	 * -----------------------------------------------------------------------------------------------------------------
	 */
	
	
	/**
	 * Add normal column to grid.
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function addNormalColumn(string $name, string $label = ''): Column;
	
	/**
	 * Add relation column to grid.
	 *
	 * Example: user.name
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function addRelationColumn(string $name, string $label = ''): Column;
	
	/**
	 * Add json column to grid.
	 *
	 * Example: user->name
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function addJsonColumn(string $name, string $label = ''): Column;
	
	
	
	
	/**
	 * -----------------------------------------------------------------------------------------------------------------
	 * Grid base information.
	 * -----------------------------------------------------------------------------------------------------------------
	 */
	
	
	/**
	 * @param string $title
	 * @return Grid
	 */
	public function setTitle(string $title): self ;
	public function setDescription(string $description): self ;
	
	public function title(): string ;
	public function description(): string ;
	
	
	/**
	 * Set model for grid.
	 *
	 * @param Model|Builder $model
	 * @return Grid
	 */
	public function model(Model $model): self ;
	
	/**
	 * Which columns expected to display.
	 *
	 * @param $name
	 * @param string $label
	 * @return Column
	 */
	public function column($name, string $label = ''): Column ;
	
	/**
	 * Query builder from end user.
	 *
	 * @param Closure $builder
	 */
	public function query(Closure $builder): void ;
	
	/**
	 * Return expected columns to show.
	 *
	 * @return mixed
	 */
	public function columns() : Collection;
	
	/**
	 * Return grid data.
	 *
	 * @return mixed
	 */
	public function items();
	
	/**
	 * Render grid view.
	 *
	 * @return View
	 */
	public function render(): View;
}
