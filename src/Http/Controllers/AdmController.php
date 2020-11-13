<?php
namespace Rainsens\Adm\Http\Controllers;

class AdmController extends Controller
{
	public function __construct()
	{
		$this->middleware('adm.auth');
	}
}
