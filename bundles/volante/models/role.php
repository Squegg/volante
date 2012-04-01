<?php
class Role extends Model {

	public function lang()
	{
		return $this->has_many('RoleLang', null, function($query)
		{
			return $query->where_language_id(Session::get('language_id'));
		});
	}

	public function accounts()
	{
		return $this->has_and_belongs_to_many('Account');
	}

}