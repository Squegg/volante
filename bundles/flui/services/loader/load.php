<?php namespace FlUI\Services\Loader;

use FlUI\Services\Loader;

class Load {
	
	public static function model($name)
	{
		return Loader::load('model', $name);
	}

	public static function module($name)
	{
		return Loader::load('module', $name);	
	}
		
}