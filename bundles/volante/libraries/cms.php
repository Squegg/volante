<?php
class CMS {

	public static function routes()
	{
		Route::get('assets/(.*)', 'cms.core@asset');
		Route::any('(.*)', 'cms.core@page');
	}

}