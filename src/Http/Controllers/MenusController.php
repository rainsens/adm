<?php
namespace Rainsens\Adm\Http\Controllers;

use Rainsens\Adm\Models\Menu;
use Rainsens\Adm\Support\Nestable;

class MenusController extends AdmController
{
	protected $title = '菜单管理';
	
	public function index(Menu $menu)
	{
		$nestableMenus = $menu->nestable('order');
		$select2Menus = $menu->select2data('name');
		
		return view('adm::pages.menus.index', compact('select2Menus', 'nestableMenus'));
	}
	
	public function create()
	{
		$select2Menus = Menu::select2data('name');
		return view('adm::pages.menus.createdit', compact('select2Menus'));
	}
	
	public function store(Menu $menu)
	{
		$this->validate(request(), [
			'parent_id' => ['numeric'],
			'name' => ['required', 'string', 'max:255'],
			'icon' => ['required', 'string', 'max:255'],
			'url' => ['string', 'max:255', 'nullable'],
			'order' => ['numeric']
		]);
		$menu->fill(request()->all());
		$menu->save();
		session()->flash('system', '菜单创建成功');
		return redirect()->route('adm.menus.index');
	}
	
	public function edit(Menu $menu)
	{
		$select2Menus = Menu::select2data('name');
		return view('adm::pages.menus.createdit', compact('menu', 'select2Menus'));
	}
	
	public function update(Menu $menu)
	{
		$menu->update(request()->all());
		return redirect()->route('menu.index')->with('system', '修改成功');
	}
	
	public function order(Menu $menu)
	{
		$this->validate(request(), [
			'data' => 'required|array'
		]);
		
		$menu->orderMenus(request('data'));
		
		return response([], 201);
	}
	
	public function destroy(Menu $menu)
	{
		$menu->delete();
		return redirect(route('adm::menus.index'))->with('system', '删除成功');
	}
}
