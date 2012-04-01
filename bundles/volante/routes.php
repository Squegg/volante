<?php
//Route::controller(array('volante::dashboard', 'volante::ajax', 'volante::accounts', 'volante::account', 'volante::modules', 'volante::layouts', 'volante::pages', 'volante::settings'));
Route::any('(:bundle)/(:any)', 'volante::(:1)@index');
Route::any('(:bundle)/(:any)/(:any)', 'volante::(:1)@(:2)');
/*
Route::get('assets/(.*)', 'volante::core@asset');
Route::any('(.*)', 'volante::page@page');

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
});*/