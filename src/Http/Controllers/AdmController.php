<?php
namespace Rainsens\Adm\Http\Controllers;

use Rainsens\Adm\Facades\AdmAuth;

class AdmController extends Controller
{
	public function __construct()
	{
		$guard = AdmAuth::guardName();
		$this->middleware(['adm', "permits:{$guard}"]);
	}
}
