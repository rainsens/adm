<?php
namespace Rainsens\Adm\Widgets\Button;

class Button
{
	protected $href     = null;
	protected $icon     = '';
	protected $text     = 'Adm Button';
	protected $color    = 'btn-default';
	protected $size     = 'btn-sm';
	protected $state    = ''; // disabled active
	protected $block    = false;
	
	public function href(string $url = '')
	{
		$this->href = $url;
		return $this;
	}
	
	public function icon(string $icon = '')
	{
		$this->icon = $icon;
		return $this;
	}
	
	public function text(string $text = '')
	{
		$this->text = $text;
		return $this;
	}
	
	public function color(string $color = '')
	{
		$this->color = $color;
		return $this;
	}
	
	public function state(string $state = '')
	{
		$this->state = $state;
		return $this;
	}
	
	public function size(string $size = '')
	{
		$this->size = $size;
		return $this;
	}
	
	public function block(bool $block = false)
	{
		$this->block = $block;
		return $this;
	}
	
	public function getTag()
	{
		return $this->href ? 'a' : 'button';
	}
	
	public function normalBtn(string $text = '')
	{
		$tag = $this->getTag();
		
		$button = <<<BUTTON
		
	<$tag type="button" class="btn {$this->size} {$this->color} {$this->block}">
		<span class="{$this->icon}"></span> {$this->text}
	</$tag>
	
BUTTON;
		
		return $button;
	}
	
	public function loadingBtn()
	{
		$tag = $this->getTag();
	}
	
	public function iconBtn()
	{
		$tag = $this->getTag();
	}
	
	public function dropdownBtn()
	{
		$tag = $this->getTag();
	}
	
	public function socialBtn()
	{
		$tag = $this->getTag();
	}
}
