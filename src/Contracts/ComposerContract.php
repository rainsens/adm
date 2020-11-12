<?php
namespace Rainsens\Adm\Contracts;

interface ComposerContract
{
	/**
	 * @param $path
	 * @param $key
	 * @param string $value
	 */
	public function setPsrFourItem($path, $key, $value) : void ;
	
	public function hasPsrFourItem($path, $key) : bool ;
	
	public function removePsrFourItem($path, $key) : void ;
}
