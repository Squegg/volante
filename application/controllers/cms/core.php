<?php
class Cms_Core_Controller extends Controller {

	public function action_page($uri)
	{
		$segments = explode('/', $uri);
		$language = Language::where_language_key($segments[0])->first();
		$page = Page::with('regions', function($query) {
					return $query->where('regions.language_id', '=', 2);
				})
				->join('page_lang', 'pages.id', '=', 'page_lang.page_id')
				->where('pages.online', '=', true)
				->where('page_lang.active', '=', true)
				->where('page_lang.url', '=', implode('/', array_slice($segments, 1)))
				->where('page_lang.language_id', '=', $language->id)
				->get();

		var_dump($page);
	}

	public function action_asset($uri)
	{
		$asset = DBAsset::where_uri($uri)->first();
		return Response::make($asset->content, 200, array('Content-Type' => $asset->content_type));
	}

}