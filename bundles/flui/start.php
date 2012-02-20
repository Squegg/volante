<?php
Autoloader::namespaces(array(
    'FlUI' => path('bundle').'flui',
));


Route::get('flui/(:all)', function($uri)
{
	$segments = explode('/', $uri);
	list($module, $action) = $segments;
	$action = $action ? $action : 'index';
	return FlUI\Core::render('get', $module, $action);
});