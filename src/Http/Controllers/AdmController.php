<?php
namespace Rainsens\Adm\Http\Controllers;

use Rainsens\Adm\Facades\AdmAuth;

class AdmController extends Controller
{
	protected $title = 'Adm Title';
	
	public function __construct()
	{
		$guard = AdmAuth::guardName();
		$this->middleware(['adm', "permits:{$guard}"]);
	}
	
	public function index()
	{
	
	}
	
	public function create()
	{
	
	}
	
	public function store()
	{
	
	}
	
	public function edit()
	{
	
	}
	
	public function update()
	{
	
	}
	
	public function destroy()
	{
	
	}
}
