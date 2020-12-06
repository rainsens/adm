<?php
namespace Rainsens\Adm\Contracts\Grid;

use Illuminate\Contracts\View\View;

interface Render
{
	public function response(): View ;
}
