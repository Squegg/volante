<?php
class Volante_Dashboard_Controller extends Volante_Base_Controller {

	public function layout($title = '')
	{
		return parent::layout('Dashboard');
	}

	public function get_index()
	{
		$this->layout->content = View::make('admin.dashboard');
	}

}