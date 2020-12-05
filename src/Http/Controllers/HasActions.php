<?php
namespace Rainsens\Adm\Http\Controllers;

use Illuminate\Support\Facades\View;
use Rainsens\Adm\Contracts\Grid\Grid;

/**
 * Trait HasActions
 * @package Rainsens\Adm\Http\Controllers
 * @method Grid grid()
 */
trait HasActions
{
	public function index()
	{
		return $this->grid()->render();
	}
	
	public function create()
	{
		return view('adm::pages.form', [
			'title' => $this->title,
			'description' => $this->description,
			'form' => $this->form()
		]);
	}
	
	public function store()
	{
		return $this->form()->store();
	}
	
	public function edit($id)
	{
	
	}
	
	public function update($id)
	{
		return $this->form()->update($id);
	}
	
	public function destroy($id)
	{
		return $this->form()->destroy($id);
	}
}
