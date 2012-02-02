<?php
class CMS {

	public static function routes()
	{
		Router::register('GET /assets/(.*)', 'cms.core@asset');
		Router::register('GET /admin', 'cms.admin@index');
		Router::register(array('GET /(.*)', 'PUT /(.*)', 'DELETE /(.*)', 'POST /(.*)'), 'cms.core@page');
	}

}