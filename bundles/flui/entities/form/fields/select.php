<?php namespace FlUI\Entities\Form\Fields;

use Laravel\Form;
use FlUI\Entities\Form\Field;

class Select extends Field {

	public $options;

	public function __construct($name, $options = array(), $attributes = array(), $selected = '')
	{
		$this->name = $name;
		$this->options = $options;
		$this->attributes = $attributes;
		$this->value = $selected;
	}

	public function render()
	{
		return Form::select($this->name, $this->options, $this->value, $this->attributes);
	}

}