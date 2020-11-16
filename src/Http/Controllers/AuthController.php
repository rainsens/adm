<?php
namespace Rainsens\Adm\Http\Controllers;

class AuthController extends Controller
{
	public function login()
	{
		if (auth()->check()) {
			return redirect()->intended(route('adm.home'));
		}
		return view('adm::auth.login');
	}
	
	public function store()
	{
		$this->validate(request(), [
			'name' => 'required',
			'password' => 'required'
		]);
		return redirect(route('adm.home'))->with('success', '欢迎回来!');
	}
}
