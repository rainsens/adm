<?php
namespace Rainsens\Adm\Http\Controllers;

class AdmController extends Controller
{
	protected $title = 'Adm Title';
	
	public function __construct()
	{
		$this->middleware('adm.auth');
	}
}
