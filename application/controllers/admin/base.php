<?php
class Admin_Base_Controller extends Base_Controller {

	public $restful = true;
	public $layout = true;

	public function __construct()
	{
		$this->filter('before', 'auth|is_admin');
		if( ! Session::has('language_id'))
		{
			Session::put('language_id', 1);
		}
	}

	public function layout($title = '')
	{
		$menu_data = array(
			'menu' => Config::get('menus.admin')
		);

		$header_data = array(
			'title' => 'Admin | ' . $title
		);

		$this->layout = View::make('layouts.'.(Input::has('ajax') ? 'ajax' : 'default'))
							->with('header_data', $header_data)
							->with('menu_data', $menu_data);

		return $this->layout;
	}

	public function get_set_language($id = 0)
	{
		Session::put('language_id', $id);
		Redirect::to(implode('/', array_slice(explode('/', URI::current()), 0, -2)));
	}

}

