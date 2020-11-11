<?php
namespace Rainsens\Adm\Contracts;

interface ComposerInterface
{
	public function setAdmAutoload($string) : void ;
	public function setAdmAutoloadTest($string) : void ;
}
