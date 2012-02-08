<?php
class Base_Controller extends Controller {

	public $restful = true;

	public function get_set_language($id = 0)
	{
		Session::put('language_id', $id);
		Redirect::to(implode('/', array_slice(explode('/', URI::current()), 0, -2)));
	}

	/**
	* Catch-all method for requests that can't be matched.
	*
	* @param string $method
	* @param array $parameters
	* @return Laravel\Response
	*/
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}