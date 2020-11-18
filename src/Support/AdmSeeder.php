<?php
namespace Rainsens\Adm\Support;

use Illuminate\Database\Seeder;
use Rainsens\Adm\Models\Menu;

class AdmSeeder extends Seeder
{
	public function run()
	{
		// Initialize first adm user.
		$userModel = app(config('adm.auth.model'));
		$userAccountField = config('adm.auth.fields.account');
		$userPasswordField = config('adm.auth.fields.password');
		$userIdentityField = config('adm.auth.fields.identity');
		
		$userModel->$userAccountField = 'adm';
		$userModel->$userPasswordField = '$2y$10$GFcriy03N2TRsW0mRid/p.aoDtgAfZTIbXs69PBo3e4t7WhZM.TyK';
		$userModel->$userIdentityField = 'adm';
		$userModel->save();
		
		// Menus.
		Menu::insert([
			[
				'parent_id' => 0,
				'order'     => 1,
				'name'      => 'Dashboard',
				'icon'      => 'fa-bar-chart',
				'url'       => '/',
			],
			[
				'parent_id' => 0,
				'order'     => 2,
				'name'      => 'Adm',
				'icon'      => 'fa-tasks',
				'url'       => '',
			],
			[
				'parent_id' => 2,
				'order'     => 3,
				'name'      => 'Users',
				'icon'      => 'fa-users',
				'url'       => 'users',
			],
			[
				'parent_id' => 2,
				'order'     => 4,
				'name'      => 'Roles',
				'icon'      => 'fa-user',
				'url'       => 'roles',
			],
			[
				'parent_id' => 2,
				'order'     => 5,
				'name'      => 'Permission',
				'icon'      => 'fa-ban',
				'url'       => 'permissions',
			],
			[
				'parent_id' => 2,
				'order'     => 6,
				'name'      => 'Menu',
				'icon'      => 'fa-bars',
				'url'       => 'menus',
			],
			[
				'parent_id' => 2,
				'order'     => 7,
				'name'      => 'Operation log',
				'icon'      => 'fa-history',
				'url'       => 'logs',
			],
		]);
	}
}
