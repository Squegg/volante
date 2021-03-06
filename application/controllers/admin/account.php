<?php
class Admin_Account_Controller extends Admin_Base_Controller {

	public function layout($title = '')
	{
		return parent::layout('Account');
	}

	public function get_login()
	{
		$this->layout->content = View::make('admin.account.login');
	}

	public function put_login()
	{
		$rules = array(
			'email' => 'required|email',
			'password' => 'required',
		);

		$validator = new Validator(Input::all(), $rules);
		if ($validator->valid())
		{
			if (Auth::attempt(Input::get('email'), Input::get('password')))
			{
				return Redirect::to('admin/account/profile');
			}
		}

		return Redirect::to('admin/account/login')
					 ->with('errors', $validator->errors);
	}

	public function get_profile()
	{
		$language = Language::where_id(Auth::user()->language_id)
							   ->first()->name;

		$this->layout->content = View::make('admin.account.profile')
									 ->with('language', $language);
	}

	public function get_edit()
	{
		$account = Account::find(Auth::user()->id);

		if( ! $account OR Authority::cannot('update', 'Account', $account))
		{
			return Redirect::to('admin/accounts');
		}

		$languages = array();
		foreach(Language::all() as $language)
		{
			$languages[$language->id] = $language->name;
		}

		$this->layout->content = View::make('admin.account.edit')
									 ->with('account', $account)
									 ->with('languages', $languages);
	}

	public function put_edit($id = 0)
	{
		$account = Account::find(Auth::user()->id);
		if( ! $account OR Authority::cannot('update', 'Account', $account))
		{
			return Redirect::to('admin/account/profile');
		}

		$errors = $account->validate_and_update();
		if(count($errors->all()) > 0)
		{
			return Redirect::to('admin/account/edit')
						 ->with('errors', $errors)
				   ->with_input('except', array('password'));
		}

		Notification::success(__('admin_account.edit.success'));

		return Redirect::to('admin/account/profile');
	}

	public function get_logout()
	{
		Auth::logout();

		Notification::success(__('admin_account.logout.success'));

		return Redirect::to('admin/account/login');
	}
}