<?php
class Admin_Dashboard_Controller extends Admin_Base_Controller {

	public function layout($title = '')
	{
		return parent::layout('Dashboard');
	}

	public function get_index()
	{
		$this->layout->content = View::make('admin.dashboard');
	}

}