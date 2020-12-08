<?php
namespace Rainsens\Adm\Contracts\Grid;

use Illuminate\Support\Collection;

interface Action
{
	/**
	 * Add custom action to actions array.
	 *
	 * @param Actor $actor
	 * @return Action
	 */
	public function add(Actor $actor): self ;
	
	/**
	 * Get certain action;
	 *
	 * @return Collection
	 */
	public function get(): Collection;
	
	/**
	 * Push all actions to grid items.
	 *
	 * @param $gridItems
	 * @return mixed
	 */
	public function push($gridItems);
}
