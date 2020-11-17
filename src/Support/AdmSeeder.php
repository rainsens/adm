<?php
namespace Rainsens\Adm\Support;

use Illuminate\Database\Seeder;

class AdmSeeder extends Seeder
{
	public function run()
	{
		$userModel = app(config('adm.auth.model'));
		$userAccountField = config('adm.auth.fields.account');
		$userPasswordField = config('adm.auth.fields.password');
		$userIdentityField = config('adm.auth.fields.identity');
		
		$userModel->$userAccountField = 'adm';
		$userModel->$userPasswordField = '$2y$10$GFcriy03N2TRsW0mRid/p.aoDtgAfZTIbXs69PBo3e4t7WhZM.TyK';
		$userModel->$userIdentityField = 'adm';
		$userModel->save();
	}
}
