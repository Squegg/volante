<?php
class Admin_Settings_Controller extends Controller {

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
			'title' => 'Admin | Settings'
		);

		$this->layout = View::make('layouts.default')
							->with('header_data', $header_data)
							->with('menu_data', $menu_data);

		return $this->layout;
	}

	public function get_index()
	{
		if(Authority::cannot('read', 'Setting'))
		{
			return Redirect::to('admin');
		}

		$settings = Setting::all();

		$this->layout->content = View::make('admin.settings.index')
									 ->with('settings', $settings);
	}

	public function put_edit()
	{
		$settings = Setting::all();

		$errors = $settings->validate_and_update();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/settings')
						 ->with('errors', $errors)
				   ->with_input();
		}

		Notification::success('Successfully updated settings');

		return Redirect::to('admin/settings');
	}

}