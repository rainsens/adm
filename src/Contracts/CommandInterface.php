<?php
namespace Rainsens\Adm\Contracts;

interface CommandInterface
{
	public function getLogo() : string;
	
	public function getVersion() : string;
	
	public function getCommands() : array ;
}
