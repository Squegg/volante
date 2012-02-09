<?php

class Setting extends Model {

	public $rules = array(
		'default_language_id' => 'required'
	);

	public function validate_and_update()
	{
		$validator = new Validator(Input::all(), $this->rules);

		if ($validator->valid())
		{
			$this->default_language_id = Input::get('default_language_id');
			$this->save();

			Session::put('admin.settings', $this->attributes);
		}

		return $validator->errors;
	}

}