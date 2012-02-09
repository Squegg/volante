<?php
class Admin_Layouts_Controller extends Admin_Base_Controller {

	public function layout($title = '')
	{
		return parent::layout('Layouts');
	}

	public function get_index()
	{
		if(Authority::cannot('read', 'Layout'))
		{
			return Redirect::to('admin');
		}

		$layoutgroups = LayoutGroup::with('layouts', function($query) {
			$query->order_by(Input::get('sort_by', 'name'), Input::get('order', 'ASC'));

			if(Input::has('q'))
			{
				die(Input::get('q'));
				foreach(array('name') as $column)
				{
					$layoutgroups->or_where($column, '~*', Input::get('q'));
				}
			}
		})->all();

		$this->layout->content = View::make('admin.layouts.index')
									 ->with('layoutgroups', $layoutgroups);
	}

	public function get_add()
	{
		if(Authority::cannot('create', 'Layout'))
		{
			return Redirect::to('admin/layouts');
		}

		$roles_lang = array();
		foreach(DB::table('role_lang')->get() as $role_lang)
		{
			$roles_lang[$role_lang->id] = $role_lang;
		}

		$roles = array();
		foreach(Role::all() as $role)
		{
			$roles[$role->id] = $roles_lang[$role->id]->name;
		}

		$this->layout->content = View::make('admin.layouts.add')
									 ->with('roles', $roles);
	}

	public function post_add()
	{
		$layout = new Layout;

		$errors = $layout->validate_and_insert();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/layouts/add')
						 ->with('errors', $errors)
				   ->with_input('except', array('password'));
		}

		Notification::success(__('admin_layouts.add.success'));

		return Redirect::to('admin/layouts/index');
	}

	public function get_edit($id = 0)
	{
		$layout = Layout::find($id);

		if( ! $layout OR $id == 0 OR Authority::cannot('update', 'Layout', $layout))
		{
			return Redirect::to('admin/layouts/index');
		}

		$this->layout->content = View::make('admin.layouts.edit')
									 ->with('layout', $layout);
	}

	public function put_edit($id = 0)
	{
		$layout = Layout::find($id);
		if( ! $layout OR $id == 0)
		{
			return Redirect::to('admin/layouts');
		}

		$errors = $layout->validate_and_update();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/layouts/edit')
						 ->with('errors', $errors)
				   ->with_input('except', array('password'));
		}

		Notification::success(__('admin_layouts.edit.success'));

		return Redirect::to('admin/layouts');
	}

	public function get_delete($id = 0)
	{
		$layout = Layout::find($id);

		if( ! $layout OR $id == 0 OR Authority::cannot('delete', 'Layout', $layout))
		{
			return Redirect::to('admin/layouts');
		}

		$this->layout->content = View::make('admin.layouts.delete')
									 ->with('layout', $layout);
	}

	public function put_delete($id = 0)
	{
		$layout = Layout::find($id);
		if( ! $layout OR $id == 0 OR Authority::cannot('delete', 'Layout', $layout))
		{
			return Redirect::to('admin/layouts');
		}

		$layout->delete();

		Notification::success(__('admin_layouts.delete.success'));

		return Redirect::to('admin/layouts');
	}
}