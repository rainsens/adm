<?php
namespace Rainsens\Adm\Contracts\Grid;

interface Column
{
	public function name(string $name): self ;
	public function label(string $label = ''): self ;
	public function setRelation(string $relation, string $column = null): self ;
}
