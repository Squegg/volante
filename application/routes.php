<?php
Filter::register('before', function()
{
	// Do stuff before every request to your application...
});

Filter::register('after', function()
{
	// Do stuff after every request to your application...
});

Filter::register('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Filter::register('auth', function()
{
	if (Auth::guest()) return Redirect::to('account/login');
});

Filter::register('can', function($action, $resource) {
	if ( ! Authority::can($action, $resource)) return Redirect::to('home');
});

// Routes
Router::register('GET /', 'frontend.home@index');
Router::register('GET /home/(:any?)', 'frontend.home@index');
Router::register(array('GET /account/(:any?)', 'PUT /account/(:any?)', 'POST /account/(:any?)'), 'frontend.account@(:1)');

Router::register(array('GET /admin', 'PUT /admin', 'POST /admin', 'DELETE /admin', 'UPDATE /admin'), 'admin.dashboard@index');
Router::register(array('GET /admin/dashboard', 'PUT /admin/dashboard', 'POST /admin/dashboard', 'DELETE /admin/dashboard', 'UPDATE /admin/dashboard'), 'admin.dashboard@index');
Router::register(array('GET /admin/accounts/(:any?)', 'PUT /admin/accounts/(:any?)', 'POST /admin/accounts/(:any?)', 'DELETE /admin/accounts/(:any?)', 'UPDATE /admin/accounts/(:any?)'), 'admin.accounts@(:1)');
Router::register(array('GET /admin/accounts/(:any)/(:any?)', 'PUT /admin/accounts/(:any)/(:any?)', 'POST /admin/accounts/(:any)/(:any?)', 'DELETE /admin/accounts/(:any)/(:any?)', 'UPDATE /admin/accounts/(:any)/(:any?)'), 'admin.accounts@(:1)');
Router::register(array('GET /admin/modules/(:any?)', 'PUT /admin/modules/(:any?)', 'POST /admin/modules/(:any?)', 'DELETE /admin/modules/(:any?)', 'UPDATE /admin/modules/(:any?)'), 'admin.modules@(:1)');
Router::register(array('GET /admin/modules/(:any)/(:any?)', 'PUT /admin/modules/(:any)/(:any?)', 'POST /admin/modules/(:any)/(:any?)', 'DELETE /admin/modules/(:any)/(:any?)', 'UPDATE /admin/modules/(:any)/(:any?)'), 'admin.modules@(:1)');

CMS::routes();

View::composer('layouts.default', function($view)
{
	Asset::container('header')->add('jquery', 'js/jquery.min.js');
	Asset::container('header')->add('bootstrap', 'bootstrap/bootstrap.css');
	Asset::container('footer')->add('bootstrap', 'bootstrap/js/bootstrap-buttons.js', 'jquery');
	Asset::container('footer')->add('bootstrap', 'bootstrap/js/bootstrap-dropdown.js', 'jquery');
	Asset::container('header')->add('main', 'css/main.css');

	$view->footer = View::make('partials.footer');
});