<?php
return array(
	'admin' => array(
		'admin/dashboard' => array(
			'name' => 'Dashboard'
		),
		'admin/pages' => array(
			'name' => 'Pages'
		),
		'admin/layouts' => array(
			'name' => 'Layouts',
		),
		'admin/accounts' => array(
			'name' => 'Accounts',
		),
		'admin/modules' => array(
			'name' => 'Modules',
		),
		'admin/settings' => array(
			'name' => 'Settings',
		)
	),
	'frontend' => array(
		'home' => array(
			'name' => 'Home'
		)
	),
	'logged_in' => array(
		'frontend' => array(
			'account/profile' => array(
				'name' => 'Profile'
			),
			'account/logout' => array(
				'name' => 'Logout'
			)
		),
	),
	'logged_out' => array(
		'frontend' => array(
			'signup' => array(
				'name' => '<b>Sign up</b>'
			),
			'account/login' => array(
				'name' => '<b>Login</b>'
			)
		)
	)
);