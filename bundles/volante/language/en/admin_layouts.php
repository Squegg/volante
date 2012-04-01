<?php return array(
	'index' => array(
		'title' => 'Layouts',
		'table' => array(
			'name' => 'name',
			'type' => 'type'
		),
		'no_results' => 'No layouts have been found',
		'add' => 'Add layout'
	),
	'add' => array(
		'title' => 'Add layout',
		'form' => array(
			'name' => 'Name',
			'type' => 'Type',
			'content' => 'Content',
			'submit' => 'Add layout'
		),
		'success' => 'Successfully added layout'
	),
	'edit' => array(
		'title' => 'Edit layout',
		'form' => array(
			'name' => 'Name',
			'type' => 'Type',
			'content' => 'Content',
			'submit' => 'Save changes'
		),
		'success' => 'Successfully updated layout'
	),
	'delete' => array(
		'title' => 'Are you sure?',
		'message' => 'You are about to delete the layout named ":0". <b>If you do, there is no turning back!</b>',
		'confirm' => 'Delete layout',
		'backtoindex' => 'Nope, I changed my mind',
		'success' => 'Successfully removed layout'
	)
);