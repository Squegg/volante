<?php namespace FlUI\Entities\Form\Fields;

use Laravel\Form;
use FlUI\Entities\Form\Field;

class CheckBox extends Field {
	
	public $name;

	public $value;

	public function __construct($name, $value)
	{
		$this->name = $name;
		$this->value = $value;
	}

	public function render()
	{
		return Form::checkbox($this->name);
	}
	
}