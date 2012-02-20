<?php namespace FlUI;

use FlUI\Entities\Form;
use FlUI\Services\Loader\Load;

class Core {

	public static function render($method, $module, $action)
	{
		$form = Load::module($module)->$action();

		var_dump($form);
		//$form = Populator::populate($edit_form, Input::all());
	}

}