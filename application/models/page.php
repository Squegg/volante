<?php
class Page extends Model {

	public static $timestamps = true;

	public function children()
	{
		return $this->has_many('Page', 'parent_id');
	}

	public function regions()
	{
		return $this->has_many('Region');
	}

}