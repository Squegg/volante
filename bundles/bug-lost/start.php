<?php
include 'phpBugLost.0.3.php';

Event::listen('laravel: query', function($sql, $bindings, $time)
{
	bl_query($sql, $bindings, $time);
});

Event::listen('laravel: done', function()
{
	echo bl_debug(get_defined_vars());
});