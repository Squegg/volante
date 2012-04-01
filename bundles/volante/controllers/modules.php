<?php
class Volante_Modules_Controller extends Volante_Base_Controller {

	public function layout($title = '')
	{
		return parent::layout('Modules');
	}

	public function get_index()
	{
		if(Authority::cannot('read', 'Module'))
		{
			return Redirect::to('admin');
		}

		$modules = Module::paginate(10);

		$this->layout->content = View::make('admin.modules.index')
									 ->with('modules', $modules)
									 ->with('remote_modules', Module::remote());
	}

	public function get_add()
	{
		if(Authority::cannot('create', 'Module'))
		{
			return Redirect::to('admin/modules');
		}

		$this->layout->content = View::make('admin.modules.add')
									 ->with('modules', Module::remote());
	}

	public function post_add()
	{
		if( ! Input::has('module'))
		{
			Notification::error(__('admin_modules.add.selectone'));

			return Redirect::to('admin/modules/add');
		}

		foreach (array_keys(Input::get('module')) as $module_key) {
			$module = new Module;

			$errors = $module->install($module_key);
		}

		Notification::success(__('admin_modules.add.success'));

		return Redirect::to('admin/modules');
	}

	public function get_update($id = 0)
	{
		$module = Module::find($id);

		if( ! $module OR $id == 0 OR Authority::cannot('update', 'Module', $page))
		{
			return Redirect::to('admin/modules');
		}

		$this->layout->content = View::make('admin.modules.edit')
									 ->with('module', $module);
	}

	public function put_update($id = 0)
	{
		$module = Module::find($id);
		if( ! $module OR $id == 0)
		{
			return Redirect::to('admin/modules');
		}

		$errors = $page->validate_and_update();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/modules/edit')
						 ->with('errors', $errors)
				   ->with_input();
		}

		Notification::success(__('admin_modules.edit.success'));

		return Redirect::to('admin/modules/index');
	}

	public function get_delete($module_key = '')
	{
		$module = Module::find($module_key);

		if( ! $module OR $module_key == '' OR Authority::cannot('delete', 'Module', $module))
		{
			return Redirect::to('admin/modules');
		}

		$this->layout->content = View::make('admin.modules.delete')
									 ->with('module', $module);
	}

	public function put_delete($id = 0)
	{
		$module = Module::find($id);
		if( ! $module OR $id == 0 OR Authority::cannot('delete', 'Module', $module))
		{
			return Redirect::to('admin/modules');
		}

		$module->delete();

		Notification::success(__('admin_modules.delete.success'));

		return Redirect::to('admin/modules');
	}

}