<?php namespace FlUI\Services;

use FlUI\Services\Repository;
use FlUI\Modules;

class Loader {
	
	public static function load($type, $class)
	{
		switch ($type) {
			case 'module':
				$class = "FlUI\\Modules\\".ucfirst($class);
				return new $class;
			break;
			case 'model':
				$model = new Repository;
				$model->set_table($class);
				return $model;
			break;
		}

	}

}