<?php namespace FlUI\Entities\Form;

class Container {
	
	public $children;

	public function add_children($children)
	{
		foreach($children as $child)
		{
			$this->children[] = $child;
		}
	}

	public function add_child($child)
	{
		$this->add_children(array($child));
	}

}