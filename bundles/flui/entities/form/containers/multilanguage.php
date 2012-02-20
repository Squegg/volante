<?php namespace FlUI\Entities\Form\Containers;

use FlUI\Entities\Form\Container;

class MultiLanguage extends Container {

	public function __construct($languages, $options, $children)
	{
		$this->add_children($children);
	}

}