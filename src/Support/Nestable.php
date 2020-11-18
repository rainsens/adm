<?php
namespace Rainsens\Adm\Support;

use Illuminate\Support\Collection;

class Nestable
{
	/**
	 * @var array
	 * Already displayed menus in nestable tree.
	 */
	static public $settled = [];
	
	public function children(Collection $data, $subId)
	{
		$children = $data->where('parent_id', $subId);
		if ($children->isNotEmpty()) {
			return $children;
		}
		return null;
	}
	
	/**
	 * @var array
	 * [
	 *      'data' => $nestableData,            // The data you provide.
	 *      'urlCreate' => 'adm.menus.create',   // Route name
	 *      'urlOrder' => 'adm.menus.order',     // Route name
	 *      'urlEdit' => 'adm.menus.edit',       // Route name
	 *      'urlDelete' => 'adm.menus.destroy',  // Route name
	 *      'urlRefresh' => 'adm.menus.index',   // Route name
	 * ]
	 */
	static public $params = [];

}
