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

		$settings = Setting::first();

		$languages = array();
		foreach(Language::all() as $language)
		{
			$languages[$language->id] = $language->name;
		}

		$this->layout->content = View::make('admin.settings.index')
									 ->with('settings', $settings)
									 ->with('languages', $languages);
	}

	public function put_index()
	{
		$settings = Setting::first();

		$errors = $settings->validate_and_update();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/settings')
						 ->with('errors', $errors)
				   ->with_input();
		}

		Notification::success(__('admin_settings.index.success'));

		return Redirect::to('admin/settings');
	}

}