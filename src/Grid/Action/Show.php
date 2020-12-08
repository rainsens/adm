<?php
namespace Rainsens\Adm\Grid\Action;

class Show extends BaseActor
{
	protected $divide = true;
	
	public function name(): string
	{
		return trans('adm::adm.show');
	}
	
	public function href(): string
	{
		return $this->route . '/' . $this->getKey();
	}
}
