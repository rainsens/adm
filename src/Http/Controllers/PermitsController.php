<?php
namespace Rainsens\Adm\Http\Controllers;

class PermitsController extends AdmController
{
	public function index()
	{
		return view('adm::pages.auth.permits');
	}
}
