<?php
namespace Rainsens\Adm\Contracts\Grid;

use Illuminate\Database\Eloquent\Model;

interface Actor
{
	public function setGrid(Grid $grid): self ;
	public function setRowModel(Model $rowModel): self ;
	public function getKey();
	public function getGridRoute(): string ;
	public function name(): string ;
	public function href(): string ;
	public function handle(): void ;
}
