<?php
class Layout extends Model {

	public static $timestamps = true;

	public static $types = array(
		'partial' => 'Partial',
		'webpage' => 'Webpage',
		'decorator' => 'Decorator',
		'javascript' => 'Javascript',
		'stylesheet' => 'Stylesheet'
	);

	public $rules = array(
		'name' => 'required'
	);

	public function layoutgroup()
	{
		return $this->belongs_to('Layoutgroup');
	}

	public function validate_and_insert()
	{
		$validator = new Validator(Input::all(), $this->rules);

		if ($validator->valid())
		{
			$this->name = Input::get('name');
			$this->type = Input::get('type');
			$this->content = $this->type == 'decorator' ? Input::get('before') . Config::get('application.key') . Input::get('after') : Input::get('content');		
			$this->layoutgroup_id = DB::table('layoutgroups')->where_null('module_id')->first()->id;
			$this->save();
		}

		return $validator->errors;
	}

	public function validate_and_update()
	{
		$validator = new Validator(Input::all(), $this->rules);
		if ($validator->valid())
		{
			$this->name = Input::get('name');
			$this->type = Input::get('type');
			$this->content = $this->type == 'decorator' ? Input::get('before') . Config::get('application.key') . Input::get('after') : Input::get('content');		
			$this->save();
		}

		return $validator->errors;
	}
	
}