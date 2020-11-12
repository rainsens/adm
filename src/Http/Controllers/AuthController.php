<?php
namespace Rainsens\Adm\Http\Controllers;

class AuthController extends AdmController
{
	public function login()
	{
		return view('adm::auth.login');
	}
	
	public function store()
	{
	
	}
}
