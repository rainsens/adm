<?php
namespace Adm\Http\Controllers;

use Rainsens\Adm\Http\Controllers\AdmController;

class ExampleController extends AdmController
{
	public function index()
	{
		return view('adm::pages.home.index');
	}
}
