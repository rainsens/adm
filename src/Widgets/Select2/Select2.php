<?php
namespace Rainsens\Adm\Widgets\Select2;

use Illuminate\Support\Collection;

class Select2
{
	function select2data(Collection $collection, string $textField) {
		
		$originalData = recursive_order($collection->toArray(), 'parent_id');
		
		$data[0] = ['id' => 0, 'text' => 'ROOT', 'html' => '┝ ROOT', 'title' => ''];
		
		foreach ($originalData as $value) {
			$prefix = '';
			for ($i = $value['level']; $i > 0; $i--) {
				$prefix .= '&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			$text = $value[$textField];
			$html = $prefix.'┝ '.$text;
			$data[] = ['id' => $value['id'], 'text' => $text, 'html' => $html, 'title' => ''];
		}
		return $data;
	}
}
