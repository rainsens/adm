<?php
namespace Rainsens\Adm\Tests\Unit\Supports;

use Illuminate\Support\Facades\File;
use Rainsens\Adm\Contracts\ComposerContract;

trait ComposerTestTrait
{
	private $key = 'test_key';
	private $value = 'test_value';
	
	private function getTestJsonToArray($path)
	{
		return json_decode(File::get($path), true);
	}
	
	public function removeTestPsrFourItem($path)
	{
		$composer = app(ComposerContract::class);
		$composer->removePsrFourItem($path, $this->key);
	}
	
	public function setTestPsrFourItem($path)
	{
		$composer = app(ComposerContract::class);
		$composer->removePsrFourItem($path, $this->key);
		$composer->setPsrFourItem($path, $this->key, $this->value);
	}
}
