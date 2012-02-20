<?php namespace FlUI\Entities\Form;

class Field {

	public $name;

	public $value;

	public $attributes;

	public function set_attribute($key, $value)
	{
		$this->attributes[$key] = $value;
	}

	public function set_value($value)
	{
		$this->value = $value;
	}

	public function set_selected($selected)
	{
		$this->value = $selected;
	}

	public function set_name($name)
	{
		$this->name = $name;	
	}

	public function get_value()
	{
		return $this->value;
	}

	public function get_name()
	{
		return $this->name;
	}

}