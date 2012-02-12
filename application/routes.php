<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your applications using Laravel's RESTful routing, and it
| is perfectly suited for building both large applications and simple APIs.
| Enjoy the fresh air and simplicity of the framework.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post('hello, world', function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/
Route::controller('home', 'frontend.home');
//Route::get('/, home, home/(:any)', 'frontend.home@index');
//Router::register('GET /home/(:any?)', 'frontend.home@index');

Router::register('GET /set_language/(:any)', function($id) {
	Session::put('language_id', $id);
	return Redirect::to(Input::get('redirect'));
});

Router::register('* /admin', 'admin.dashboard@index');
Router::register('* /admin/dashboard', 'admin.dashboard@index');

Router::register('* /admin/ajax/(:any?)', 'admin.ajax@(:1)');
Router::register('* /admin/ajax/(:any)/(:any?)', 'admin.ajax@(:1)');

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

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in "before" and "after" filters are called before and
| after every request to your application, and you may even create other
| filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Filter::register('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

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


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});
