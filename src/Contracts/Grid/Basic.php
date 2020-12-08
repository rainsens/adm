<?php
namespace Rainsens\Adm\Contracts\Grid;

use Closure;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface Basic
 * @package Rainsens\Adm\Contracts\Grid
 * @property $model
 * @property $id
 * @property $title
 * @property $description
 * @property $columns
 */
interface Basic
{
	/**
	 * Set grid id.
	 *
	 * @return Basic
	 */
	public function setId(): self ;
	
	/**
	 * Set model for grid.
	 *
	 * @param Model $model
	 * @return Basic
	 */
	public function setModel(Model $model): self ;
	
	/**
	 * Set grid title.
	 *
	 * @param string $title
	 * @return Basic
	 */
	public function setTitle(string $title): self ;
	
	/**
	 * Set grid description.
	 *
	 * @param string $description
	 * @return Basic
	 */
	public function setDescription(string $description): self ;
	
	/**
	 * Columns expected to show
	 * set initial value as collection.
	 *
	 * @return Basic
	 */
	public function setInitColumns(): self ;
	
	/**
	 * Initialization of grid from end user.
	 *
	 * @param Closure $fallback
	 */
	public function init(Closure $fallback): void ;
	
	/**
	 * Run initializations.
	 */
	public function runInitCallbacks(): void ;
	
	/**
	 * The route of grid.
	 *
	 * @return string
	 */
	public function getGridRoute(): string ;
	
	/**
	 * Which column expected to show.
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function column(string $name, string $label = ''): Column;
	
	/**
	 * Get general column for grid.
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function getNormalColumn(string $name, string $label = ''): Column;
	
	/**
	 * Get relation column for grid.
	 *
	 * Example: user.name
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function getRelationColumn(string $name, string $label = ''): Column;
	
	/**
	 * Get json column for grid.
	 *
	 * Example: user->name
	 *
	 * @param string $name
	 * @param string $label
	 * @return Column
	 */
	public function getJsonColumn(string $name, string $label = ''): Column;
	
	/**
	 * Get properties.
	 *
	 * @param $name
	 * @return mixed
	 */
	public function __get($name);
}
