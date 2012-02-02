<?php
class Account extends Model {

	public static $timestamps = true;

	public $rules = array(
		'email' => 'required|email',
		'name' => 'required',
	);

	public function roles()
	{
		return $this->has_and_belongs_to_many('Role');
	}

	/**
	 * Check if the account has a relation with the given role
	 *
	 * @param	string	$key	the role key
	 * @return	boolean
	 */
	public static function has_role($key)
	{
		foreach(Auth::user()->roles as $role)
		{
			if($role->key == $key)
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if the account has a relation with any of the given roles
	 *
	 * @param	array	$keys	the role keys
	 * @return	boolean
	 */
	public static function has_any_role($keys)
	{
		if( ! is_array($keys))
		{
			$keys = func_get_args();
		}

		foreach(Auth::user()->roles as $role)
		{
			if(in_array($role->key, $keys))
			{
				return true;
			}
		}

		return false;
	}

	public function validate_and_insert()
	{
		$this->rules['password'] = 'required';
		$validator = new Validator(Input::all(), $this->rules);

		if ($validator->valid())
		{
			$this->email = Input::get('email');
			$this->password = Hash::make(Input::get('password'));
			$this->name = Input::get('name');
			$this->save();

			if(Input::has('role_ids'))
			{
				foreach(Input::get('role_ids') as $role_id)
				{
					DB::table('accounts_roles')
						->insert(array('account_id' => $this->id, 'role_id' => $role_id));
				}
			}
		}

		return $validator->errors;
	}

	public function validate_and_update()
	{
		$validator = new Validator(Input::all(), $this->rules);
		if ($validator->valid())
		{
			$roles = DB::query("SELECT roles.id, EXISTS(SELECT 1 FROM accounts_roles WHERE role_id = roles.id AND account_id = ?) AS active FROM roles", array($this->id));
			foreach($roles as $role)
			{
				if(Input::has('role_ids') && $role->active && ! in_array($role->id, Input::get('role_ids')))
				{
					echo 'delete';
					DB::table('accounts_roles')
						->where('role_id', '=', $role->id)
						->where('account_id', '=', $this->id)
						->delete();
				}

				if(Input::has('role_ids') && ! $role->active && in_array($role->id, Input::get('role_ids')))
				{
					echo 'insert';
					var_dump(array('account_id' => '', 'role_id' => $role->id));
					DB::table('accounts_roles')
						->insert(array('account_id' => $this->id, 'role_id' => $role->id));
				}
			}

			$this->email = Input::get('email');
			if($password = Input::get('password')) $this->password = Hash::make($password);
			$this->name = Input::get('name');
			$this->save();
		}

		return $validator->errors;
	}

}