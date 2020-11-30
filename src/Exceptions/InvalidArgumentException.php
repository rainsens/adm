<?php
namespace Rainsens\Adm\Exceptions;

class InvalidArgumentException extends AdmException
{
	public function render()
	{
		return response()->view('adm::pages.error', ['exceptions' => $this]);
	}
}
