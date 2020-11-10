<?php
namespace Rainsens\Adm\Exceptions;

class AdmException extends Exception
{
	public function render()
	{
		$exception = [
			'message' => $this->getMessage(),
			'code' => $this->getCode(),
			'file' => $this->getFile(),
			'line' => $this->getLine(),
			'trace' => $this->getTraceAsString(),
		];
		session()->flash('exception', $exception);
	}
}
