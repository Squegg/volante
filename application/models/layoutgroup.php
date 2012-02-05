<?php
class LayoutGroup extends Model {

	public function layouts()
	{
		return $this->has_many('Layout');
	}

}