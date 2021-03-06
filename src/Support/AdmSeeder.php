<?php
namespace Rainsens\Adm\Support;

use Illuminate\Database\Seeder;
use Rainsens\Adm\Models\AdmUser;
use Rainsens\Adm\Models\Menu;

class AdmSeeder extends Seeder
{
	public function run()
	{
		// Initialize the first adm user.
		AdmUser::create([
			'name' => 'adm',
			'password' => bcrypt('adm'),
			'nickname' => 'Rainsen',
		]);
		
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
				'name'      => 'Adm System',
				'icon'      => 'fa-tasks',
				'url'       => '',
			],
			[
				'parent_id' => 2,
				'order'     => 3,
				'name'      => 'Adm Users',
				'icon'      => 'fa-users',
				'url'       => '/adm-users',
			],
			[
				'parent_id' => 2,
				'order'     => 4,
				'name'      => 'Roles',
				'icon'      => 'fa-user',
				'url'       => '/roles',
			],
			[
				'parent_id' => 2,
				'order'     => 5,
				'name'      => 'Permits',
				'icon'      => 'fa-ban',
				'url'       => '/permits',
			],
			[
				'parent_id' => 2,
				'order'     => 6,
				'name'      => 'Menus',
				'icon'      => 'fa-bars',
				'url'       => '/menus',
			],
			[
				'parent_id' => 2,
				'order'     => 7,
				'name'      => 'Operation logs',
				'icon'      => 'fa-history',
				'url'       => '/adm-logs',
			],
		]);
	}
}
