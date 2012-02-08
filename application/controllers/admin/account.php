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
		$this->layout->content = View::make('admin.account.profile');
	}

	public function get_edit()
	{
		$account = Account::find(Auth::user()->id);

		if( ! $account OR Authority::cannot('update', 'Account', $account))
		{
			return Redirect::to('admin/accounts/index');
		}

		$this->layout->content = View::make('admin.account.edit')
									 ->with('account', $account);
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

		Notification::success('Successfully updated profile');

		return Redirect::to('admin/account/profile');
	}

	public function get_logout()
	{
		Auth::logout();

		Notification::success('Successfully logged out!');

		return Redirect::to('admin/account/login');
	}
}