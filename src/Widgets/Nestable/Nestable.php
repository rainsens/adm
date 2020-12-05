<?php
namespace Rainsens\Adm\Widgets\Nestable;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Nestable
{
	/**
	 * Already displayed menus in nestable tree.
	 * put it in this array, and do not show it again on tree.
	 *
	 * @var array
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
	
	/**
	 *
	 * Handle the ordered data, make it easy to update to database.
	 *
	 * @param array $data
	 * @param int $parentId
	 * @return array
	 *
	 * process this format:
	 * array:2 [
	 *      0 => array:2 [
	 *          "id" => 2
	 *          "children" => array:5 [
	 *              0 => array:1 ["id" => 3]
	 *              0 => array:1 ["id" => 4]
	 *              0 => array:1 ["id" => 5]
	 *              0 => array:1 ["id" => 6]
	 *              0 => array:1 ["id" => 7]
	 *          ]
	 *      ]
	 *      1 => array:1 [
	 *          "id" => 1
	 *      ]
	 * ]
	 *
	 *
	 * to format below:
	 *
	 * array:7 [
	 *      0 => array:2 [
	 *          "id" => 2,
	 *          "order" => 1
	 *      ]
	 *      0 => array:2 [
	 *          "id" => 3,
	 *          "order" => 2
	 *      ]
	 * ]
	 *
	 */
	public function recursive(array $data, $parentId = 0)
	{
		static $result = [];
		foreach ($data as $key => $value) {
			$result[] = [
				'id' => $value['id'],
				'parent_id' => $parentId,
				'order' => $key+1,
			];
			if (Arr::has($value, 'children')) {
				$this->recursive($value['children'], $value['id']);
			}
		}
		return $result;
	}

}
