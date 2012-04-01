<?php return array(
	'index' => array(
		'title' => 'Modules',
		'add' => 'Install module',
		'table' => array(
			'name' => 'name',
			'homepage' => 'homepage',
			'uninstall' => 'uninstall',
			'visithomepage' => 'Visit homepage',
			'update' => 'Install update'
		),
		'no_results' => 'No installed modules found...'
	),
	'add' => array(
		'title' => 'Install module',
		'success' => 'Successfully installed module',
		'table' => array(
			'name' => 'name',
			'version' => 'version',
			'homepage' => 'homepage',
			'visithomepage' => 'Visit homepage'
		),
		'form' => array(
			'submit' => 'Install selected modules'
		),
		'selectone' => 'Please select a module that you would like to install'
	),
	'delete' => array(
		'title' => 'Are you sure?',
		'message' => 'You are about to uninstall the module named ":0". <b>If you do, there is no turning back!</b>',
		'confirm' => 'Uninstall module',
		'backtoindex' => 'Nope, I changed my mind',
		'success' => 'Successfully uninstalled module'
	)
);