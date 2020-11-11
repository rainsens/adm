<?php
namespace Rainsens\Adm\Console;

use Illuminate\Support\Facades\File;

trait CommandTrait
{
	protected function publishFile($targetPath, $tag)
	{
		if (File::exists($targetPath)) {
			$this->error('The dependent file already exists!');
		}
		
		$this->call('vendor:publish', [
			'--provider' => "Rainsens\Adm\Providers\AdmServiceProvider",
			'--tag' => $tag
		]);
	}
}
