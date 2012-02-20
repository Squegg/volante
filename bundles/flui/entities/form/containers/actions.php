<?php namespace FlUI\Entities\Form\Containers;

use FlUI\Entities\Form\Container;

class Actions extends Container {

	public function __construct($children)
	{
		$this->add_children($children);
	}

}