<?php
namespace Rainsens\Adm\Exceptions;

use Exception;
use Throwable;

class AdmException extends Exception
{
	protected $message;
	protected $code;
	protected $line;
	protected $file;
	protected $trace;
	
	public function __construct($message = "", $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
	
	public function __get($name)
	{
		return $this->$name ?? null;
	}
}
