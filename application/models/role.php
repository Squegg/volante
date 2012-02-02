<?php
class Role extends Model {

	public function role_lang()
	{
		return $this->has_many('Role_lang');
	}

	public function accounts()
	{
		return $this->has_and_belongs_to_many('Account');
	}

}