<?php
class Admin_Settings_Controller extends Admin_Base_Controller {

	public function layout($title = '')
	{
		return parent::layout('Settings');
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