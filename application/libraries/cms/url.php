<?php namespace CMS;

use Input;
use Session;
class URL extends \Laravel\URL {

	public static function to($url = '', $https = false)
	{
		if(Input::has('ajax'))
		{
			Session::flash('ajax', true);
		}
		return parent::to($url, $https).(Session::has('ajax') ? (stripos($url, '?') ? '&' : '?').'ajax=1' : '');
	}

}