<?php
namespace Rainsens\Adm\Tests\Unit\Console;

use Illuminate\Support\Arr;
use Rainsens\Adm\Tests\TestCase;

class ComposerTest extends TestCase
{
	use ComposerTestTrait;
	
	/** @test */
	public function can_remove_psr_item_from_end_user()
	{
		$realPath = 'autoload.psr-4.'.$this->key;
		
		$path = base_path('composer.json');
		
		$this->setTestPsrFourItem($path);
		
		$jsonArray = $this->getTestJsonToArray($path);
		$this->assertTrue(Arr::has($jsonArray, $realPath));
		
		$this->removeTestPsrFourItem($path);
		$jsonArray = $this->getTestJsonToArray($path);
		
		$this->assertFalse(Arr::has($jsonArray, $realPath));
	}
	
	/** @test */
	public function can_set_psr_item_to_end_user()
	{
		$realPath = 'autoload.psr-4.'.$this->key;
		
		$path = base_path('composer.json');
		
		$this->removeTestPsrFourItem($path);
		
		$jsonArray = $this->getTestJsonToArray($path);
		
		$this->assertFalse(Arr::has($jsonArray, $realPath));
		
		$this->setTestPsrFourItem($path);
		
		$jsonArray = $this->getTestJsonToArray($path);
		
		$this->assertTrue(Arr::has($jsonArray, $realPath));
	}
}
