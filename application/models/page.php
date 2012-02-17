<?php
class Page extends Model {

	public static $timestamps = true;

	public static $sequence = 'pages_id_seq';

	public $rules = array(
		'meta_title' => 'required',
		'menu' => 'required',
		'url' => 'required'
	);

	public function children()
	{
		return $this->has_many('Page', 'parent_id');
	}

	public function lang()
	{
		return $this->has_many('PageLang', null, function($query) {
			return $query->where_language_id(Session::get('language_id'));
		});
	}

	public function regions()
	{
		return $this->has_many('Region');
	}

	public function validate_and_insert()
	{
		$languages = Language::all();
		$errors = array();

		foreach($languages as $language)
		{
			$validator = new Validator(Input::get($language->language_key), $this->rules);
			if( ! $validator->valid())
			{
				$errors[$language->language_key] = $validator->errors;
			}
		}

		if (empty($errors))
		{
			$this->online = (int) Input::get('online');
			$this->hidden = (int) Input::get('hidden');
			$this->homepage = (int) Input::get('homepage');
			$this->layout_id = Input::get('layout_id');

			if($this->homepage)
			{
				DB::table('pages')->update(array('homepage' => 0));
			}

			$this->save();

			foreach ($languages as $language) {
				var_dump(Input::get($language->language_key));
				$page_lang = array_merge(
					array(
						'language_id' => $language->id,
						'page_id' => $this->id,
						'created_at' => 'NOW()',
						'updated_at' => 'NOW()',
						'active' => 1
					),
					array_intersect_key(Input::get($language->language_key), array_flip(array('meta_title', 'meta_description', 'meta_keywords', 'menu', 'url', 'title', 'content')))
				);
				DB::table('page_lang')->insert($page_lang);
			}
		}

		return $errors;
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

	public function delete($id = null)
	{
		DB::table('page_lang')->where_page_id($this->id)->delete();

		parent::delete($id);
	}

}