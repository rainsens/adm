<?php
namespace Rainsens\Adm\Grid\Action;

class Edit extends BaseActor
{
	public function name(): string
	{
		return trans('adm::adm.edit');
	}
	
	public function href(): string
	{
		return $this->route . '/' . $this->getKey() . '/edit';
	}
}
