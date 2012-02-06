<?php
class Admin_Pages_Controller extends Controller {

	public $restful = true;
	public $layout = true;

	public function __construct()
	{
		$this->filter('before', 'auth|is_admin');
	}

	public function layout()
	{
		$menu_data = array(
			'menu' => Config::get('menus.admin')
		);

		$header_data = array(
			'title' => 'Admin | Pages'
		);

		$this->layout = View::make('layouts.default')
							->with('header_data', $header_data)
							->with('menu_data', $menu_data);

		return $this->layout;
	}

	public function get_index()
	{
		if(Authority::cannot('read', 'Page'))
		{
			return Redirect::to('admin');
		}

		$pages = Page::all();

		$this->layout->content = View::make('admin.pages.index')
									 ->with('pages', $pages);
	}

	public function get_add()
	{
		if(Authority::cannot('create', 'Page'))
		{
			return Redirect::to('admin/pages/index');
		}

		$this->layout->content = View::make('admin.pages.add')
									 ->with('languages', Language::all());
	}

	public function post_add()
	{
		$page = new Page;

		$errors = $page->validate_and_insert();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/pages/add')
						 ->with('errors', $errors)
				   ->with_input();
		}

		Notification::success('Successfully added page');

		return Redirect::to('admin/pages/index');
	}

	public function get_update($id = 0)
	{
		$page = Page::find($id);

		if( ! $page OR $id == 0 OR Authority::cannot('update', 'Page', $page))
		{
			return Redirect::to('admin/pages/index');
		}

		$this->layout->content = View::make('admin.pages.edit')
									 ->with('page', $page);
	}

	public function put_update($id = 0)
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

	public function get_delete($page_key = '')
	{
		$page = Page::find($page_key);

		if( ! $page OR $page_key == '' OR Authority::cannot('delete', 'Page', $page))
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