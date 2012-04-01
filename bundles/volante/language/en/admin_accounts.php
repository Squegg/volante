<?php
return array(
	'index' => array(
		'title' => 'Accounts',
		'add' => 'Add account',
		'table' => array(
			'name' => 'name',
			'email' => 'email',
			'roles' => 'roles'
		),
		'no_results' => 'No accounts have been found'
	),
	'add' => array(
		'title' => 'Add account',
		'success' => 'Successfully added account',
		'form' => array(
			'name' => 'Name',
			'email' => 'Email',
			'language' => 'Language',
			'password' => 'Password',
			'roles' => 'Roles',
			'submit' => 'Add account'
		)
	),
	'edit' => array(
		'title' => 'Edit account',
		'success' => 'Successfully updated account',
		'form' => array(
			'name' => 'Name',
			'email' => 'Email',
			'language' => 'Language',
			'password' => 'New password',
			'roles' => 'Roles',
			'submit' => 'Save changes'
		)
	),
	'delete' => array(
		'title' => 'Are you sure?',
		'message' => 'You are about to delete the account for ":0 (:1)". <b>If you do, there is no turning back!</b>',
		'confirm' => 'Delete account',
		'backtoindex' => 'Back to overview',
		'success' => 'Successfully deleted account'
	)
);