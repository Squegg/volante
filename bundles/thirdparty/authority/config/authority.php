<?php
return array(

	/*
	|--------------------------------------------------------------------------
	| Initialize User Permissions Based On Roles
	|--------------------------------------------------------------------------
	|
	| This closure is called by the Authority\Ability class' "initialize" method
	|
	*/

	'initialize' => function($account)
	{
		Authority::action_alias('manage', array('create', 'read', 'update', 'delete'));
		Authority::action_alias('moderate', array('update', 'delete'));

		if ( ! $account) return false;

		if($account->has_role('superadmin'))
		{
			Authority::allow('manage', 'all');
			Authority::deny('delete', 'Account', function ($that_account) use ($account)
			{
				return $that_account->id == $account->id;
			});
		}
	}

);