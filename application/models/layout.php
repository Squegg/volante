<?php
class Layout extends Model {

	public static $timestamps = true;

	public static $types = array(
		'partial' => 'Partial',
		'webpage' => 'Webpage',
		'javascript' => 'Javascript',
		'stylesheet' => 'Stylesheet'
	);

	public $rules = array(
		'name' => 'required',
		'type' => 'required|in:partial,webpage,javascript,stylesheet',
		'content' => 'required'
	);

	public function validate_and_insert()
	{
		$validator = new Validator(Input::all(), $this->rules);

		if ($validator->valid())
		{
			$this->name = Input::get('name');
			$this->type = Input::get('type');
			$this->content = Input::get('content');
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
			$this->content = Input::get('content');
			$this->save();
		}

		return $validator->errors;
	}

}