<?php
namespace Rainsens\Adm\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login()
	{
		if (auth()->check()) {
			return redirect()->intended(route('adm.home'));
		}
		return view('adm::pages.auth.login');
	}
	
	public function store()
	{
		$credentials = $this->validate(request(), [
			'name' => 'required',
			'password' => 'required',
		]);
		
		// Identity.
		$credentials[config('adm.auth.fields.identity')] = 'adm';
		
		if (Auth::attempt($credentials, request('remember'))) {
			session()->flash('success', '欢迎回来');
			return redirect(route('adm.home'));
		} else {
			session()->flash('danger', '很抱歉，您的账号密码不匹配!');
			return redirect()->back()->withInput();
		}
	}
	
	public function logout()
	{
		Auth::logout();
		return redirect(route('adm.login'));
	}
}
