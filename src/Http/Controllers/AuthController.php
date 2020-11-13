<?php
namespace Rainsens\Adm\Http\Controllers;

class AuthController extends Controller
{
	public function login()
	{
		return view('adm::auth.login');
	}
	
	public function store()
	{
	
	}
}
