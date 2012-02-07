<?php
class Admin_Pages_Controller extends Admin_Base_Controller {

	public function layout($title = '')
	{
		return parent::layout('Pages');
	}

	public function get_index()
	{
		if(Authority::cannot('read', 'Page'))
		{
			return Redirect::to('admin');
		}

		$pages = Page::with('lang')->get();

		$this->layout->content = View::make('admin.pages.index')
									 ->with('pages', $pages);
	}

	public function get_add()
	{
		if(Authority::cannot('create', 'Page'))
		{
			return Redirect::to('admin/pages/index');
		}

		if( ! Session::has('errors'))
		{
			$errors = array();
			foreach (Language::all() as $language) {
				$errors[$language->language_key] = new Laravel\Messages;
			}
		}
		else {
			$errors = Session::get('errors');
		}

		$this->layout->content = View::make('admin.pages.add')
									 ->with('languages', Language::all())
									 ->with('errors', $errors);
	}

	public function post_add()
	{
		$page = new Page;

		$errors = $page->validate_and_insert();
		if(count($errors) > 0)
		{
			return Redirect::to('admin/pages/add')
						 ->with('errors', $errors)
				   ->with_input();
		}

		Notification::success('Successfully added page');

		return Redirect::to('admin/pages/index');
	}

	public function get_edit($id = 0)
	{
		$page = Page::find($id);

		if( ! $page OR $id == 0 OR Authority::cannot('update', 'Page', $page))
		{
			return Redirect::to('admin/pages/index');
		}

		$this->layout->content = View::make('admin.pages.edit')
									 ->with('page', $page);
	}

	public function put_edit($id = 0)
	{
		$page = Page::find($id);
		if( ! $page OR $id == 0)
		{
			return Redirect::to('admin/pages/index');
		}

		$errors = $page->validate_and_update();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/pages/edit')
						 ->with('errors', $errors)
				   ->with_input();
		}

		Notification::success('Successfully updated page');

		return Redirect::to('admin/pages/index');
	}

	public function get_delete($id = 0)
	{
		$page = Page::find($id);

		if( ! $page OR $id == 0 OR Authority::cannot('delete', 'Page', $page))
		{
			return Redirect::to('admin/pages/index');
		}

		$this->layout->content = View::make('admin.pages.delete')
									 ->with('page', $page);
	}

	public function put_delete($id = 0)
	{
		$page = Page::find($id);
		if( ! $page OR $id == 0 OR Authority::cannot('delete', 'Page', $page))
		{
			return Redirect::to('admin/pages/index');
		}

		$page->delete();

		Notification::success('Successfully removed page');

		return Redirect::to('admin/pages/index');
	}

}