<?php
class Cms_Core_Controller extends Controller {

	public function action_page($uri)
	{
		$segments = explode('/', $uri);
		$language = Language::where_language_key($segments[0])->first();
		$page = Page::with('regions', function($query) {
					return $query;//->where('regions.language_id', '=', 2);
				})
				->join('page_lang', 'pages.id', '=', 'page_lang.page_id')
				->where('pages.online', '=', 1)
				->where('page_lang.active', '=', 1)
				->where('page_lang.url', '=', implode('/', array_slice($segments, 1)))
				->where('page_lang.language_id', '=', $language->id)
				->first();

		return Response::make(Parse::page($page), 200);
	}

	public function action_asset($uri)
	{
		$content_types = array(
			'stylesheet' => 'text/css',
			'javascript' => 'text/javascript'
		);

		$asset = DBAsset::where_uri($uri)->first();
		return Response::make($asset->content, 200, array('Content-Type' => $content_types[$asset->content_type]));
	}

}