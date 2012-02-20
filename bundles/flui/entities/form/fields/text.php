<?php namespace FlUI\Entities\Form\Fields;

use Laravel\Form;
use FlUI\Entities\Form\Field;

class Text extends Field {
	
	public $name;

	public $value;

	public function __construct($name, $rules = null, $value = '')
	{
		$this->name = $name;
		$this->value = $value;
	}

	public function render()
	{
		return Form::text($this->name);
	}
	
}