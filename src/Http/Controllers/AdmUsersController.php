<?php
namespace Rainsens\Adm\Http\Controllers;

class AdmUsersController extends AdmController
{
	public function index()
	{
		return view('adm::pages.admusers.index');
	}
	
	/*public function create()
	{
		return view('adm::pages.admusers.createdit');
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
		return view('adm::pages.admusers.createdit');
	}
	
	public function update(Menu $menu)
	{
		$menu->update(request()->all());
		return redirect()->route('menu.index')->with('system', '修改成功');
	}
	
	public function destroy(Menu $menu)
	{
		$menu->delete();
		return redirect(route('adm::menus.index'))->with('system', '删除成功');
	}*/
}
