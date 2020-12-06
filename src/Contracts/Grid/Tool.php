<?php
namespace Rainsens\Adm\Contracts\Grid;

interface Tool
{
	public function prepend(string $element = ''): self ;
	
	public function append(string $element = ''): self ;
	
	public function getCreateRoute(): string ;
	
	public function createButton();
	
	public function render();
}
