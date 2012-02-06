<?php
class Page extends Model {

	public static $timestamps = true;

	public $rules = array(
	);

	public function children()
	{
		return $this->has_many('Page', 'parent_id');
	}

	public function regions()
	{
		return $this->has_many('Region');
	}

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