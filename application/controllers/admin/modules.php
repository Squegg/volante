<?php
class Admin_Modules_Controller extends Admin_Base_Controller {

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
			return Redirect::to('admin/modules/index');
		}

		$this->layout->content = View::make('admin.modules.add')
									 ->with('modules', Module::remote());
	}

	public function post_add()
	{
		if( ! Input::has('module'))
		{
			Notification::error('Please select a module that you would like to install');

			Redirect::to('admin/modules/add');
		}

		foreach (array_keys(Input::get('module')) as $module_key) {
			$module = new Module;

			$errors = $module->install($module_key);
		}
		die;

		Notification::success('Successfully installed module');

		return Redirect::to('admin/modules/index');
	}

	public function get_update($id = 0)
	{
		$module = Module::find($id);

		if( ! $module OR $id == 0 OR Authority::cannot('update', 'Module', $page))
		{
			return Redirect::to('admin/modules/index');
		}

		$this->layout->content = View::make('admin.modules.edit')
									 ->with('module', $module);
	}

	public function put_update($id = 0)
	{
		$module = Module::find($id);
		if( ! $module OR $id == 0)
		{
			return Redirect::to('admin/modules/index');
		}

		$errors = $page->validate_and_update();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/modules/edit')
						 ->with('errors', $errors)
				   ->with_input();
		}

		Notification::success('Successfully updated module');

		return Redirect::to('admin/modules/index');
	}

	public function get_delete($module_key = '')
	{
		$module = Module::find($module_key);

		if( ! $module OR $module_key == '' OR Authority::cannot('delete', 'Module', $module))
		{
			return Redirect::to('admin/modules/index');
		}

		$this->layout->content = View::make('admin.modules.delete')
									 ->with('module', $module);
	}

	public function put_delete($id = 0)
	{
		$module = Module::find($id);
		if( ! $module OR $id == 0 OR Authority::cannot('delete', 'Module', $module))
		{
			return Redirect::to('admin/modules/index');
		}

		$module->delete();

		Notification::success('Successfully removed module');

		return Redirect::to('admin/modules/index');
	}

}