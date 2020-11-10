<?php
namespace Rainsens\Adm\Console;

use Illuminate\Filesystem\Filesystem;

trait AdmCommandTrait
{
	/**
	 * @return Filesystem
	 */
	protected function storage()
	{
		return $this->laravel['files'];
	}
}
