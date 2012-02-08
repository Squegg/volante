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
	if (Auth::guest()) return Redirect::to('admin/account/login');
});

Filter::register('can', function($action, $resource) {
	if ( ! Authority::can($action, $resource)) return Redirect::to('/');
});

// Routes
Router::register('GET /', 'frontend.home@index');
Router::register('GET /home/(:any?)', 'frontend.home@index');

Router::register('GET /set_language/(:any)', function($id) {
	Session::put('language_id', $id);
	return Redirect::to(Input::get('redirect'));
});

Router::register('* /admin', 'admin.dashboard@index');
Router::register('* /admin/dashboard', 'admin.dashboard@index');

Router::register('* /admin/account/(:any?)', 'admin.account@(:1)');
Router::register('* /admin/account/(:any)/(:any?)', 'admin.account@(:1)');

Router::register('* /admin/accounts/(:any?)', 'admin.accounts@(:1)');
Router::register('* /admin/accounts/(:any)/(:any?)', 'admin.accounts@(:1)');

Router::register('* /admin/modules/(:any?)', 'admin.modules@(:1)');
Router::register('* /admin/modules/(:any)/(:any?)', 'admin.modules@(:1)');

Router::register('* /admin/layouts/(:any?)', 'admin.layouts@(:1)');
Router::register('* /admin/layouts/(:any)/(:any?)', 'admin.layouts@(:1)');

Router::register('* /admin/pages/(:any?)', 'admin.pages@(:1)');
Router::register('* /admin/pages/(:any)/(:any?)', 'admin.pages@(:1)');

Router::register('* /admin/settings/(:any?)', 'admin.settings@(:1)');
Router::register('* /admin/settings/(:any)/(:any?)', 'admin.settings@(:1)');

CMS::routes();

View::composer('layouts.default', function($view)
{
	Asset::container('header')->add('jquery', 'js/jquery.min.js');
	Asset::container('header')->add('bootstrap', 'bootstrap/bootstrap/css/bootstrap.min.css');
	Asset::container('footer')->add('bootstrap', 'bootstrap/bootstrap/js/bootstrap.js', 'jquery');
	Asset::container('header')->add('main', 'css/main.css');

	$view->footer = View::make('partials.footer');
});

View::composer('layouts.ajax', function($view)
{
	Asset::container('header')->add('jquery', 'js/jquery.min.js');
	Asset::container('header')->add('bootstrap', 'bootstrap/bootstrap/css/bootstrap.min.css');
	Asset::container('footer')->add('bootstrap', 'bootstrap/bootstrap/js/bootstrap.js', 'jquery');
	Asset::container('header')->add('main', 'css/main.css');

	$view->footer = View::make('partials.footer');
});