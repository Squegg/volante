<?php
class Volante_Layouts_Controller extends Volante_Base_Controller {

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

		Asset::container('footer')
				   ->add('ace', 'ace/ace.js')
				   ->add('theme-twilight', 'ace/theme-twilight.js')
				   ->add('mode-js', 'ace/mode-javascript.js')
				   ->add('mode-css', 'ace/mode-css.js')
				   ->add('mode-html', 'ace/mode-html.js')
   				   ->add('forms', 'js/admin/layouts/forms.js');


		$this->layout->content = View::make('admin.layouts.add');
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

		if($layout->type == 'decorator')
		{
			list($layout->before, $layout->after) = explode(Config::get('application.key'), $layout->content);
			$layout->content = '';
		}

		if( ! $layout OR $id == 0 OR Authority::cannot('update', 'Layout', $layout))
		{
			return Redirect::to('admin/layouts/index');
		}

		Asset::container('footer')
				   ->add('ace', 'ace/ace.js')
				   ->add('theme-twilight', 'ace/theme-twilight.js')
				   ->add('mode-js', 'ace/mode-javascript.js')
				   ->add('mode-css', 'ace/mode-css.js')
				   ->add('mode-html', 'ace/mode-html.js')
   				   ->add('forms', 'js/admin/layouts/forms.js');

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