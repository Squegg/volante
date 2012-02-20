<?php namespace FlUI\Entities\Form\Fields;

use Laravel\Form;
use FlUI\Entities\Form\Field;

class TextArea extends Field {

	public function __construct($name, $value = '', $attributes = array())
	{
		$this->name = $name;
		$this->value = $value;
		$this->attributes = $attributes;
	}

	public function render()
	{
		return Form::textarea($this->name, $this->value, $this->attributes);
	}
	
}