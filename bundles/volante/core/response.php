<?php namespace Laravel\Core;

class Response {
	
	public function page($uri)
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

		$content = Parse::page($page);

		if(Authority::can('update', 'Page'))
		{
			Asset::container('header')->add('jquery', 'js/jquery.min.js');
			Asset::container('header')->add('jquery-ui', 'js/jquery-ui.min.js');
			Asset::container('header')->add('frontend-css', 'css/volante/frontend.css');
			Asset::container('footer')->add('frontend-js', 'js/volante/frontend.js');

			$decorators = Layout::where_type('decorator')->get();
			$header_append = Asset::container('header')->styles().Asset::container('header')->scripts();
			$body_append = View::make('frontend.widgets')->render().View::make('frontend.decorators')->with('decorators', $decorators)->render().Asset::container('footer')->scripts();
			
			$content = str_replace('</head>', $header_append.'</head>', $content);
			$content = str_replace('</body>', $body_append.'</body>', $content);
		}

		return Response::make($content, 200);
	}

	public function asset($uri)
	{
		$content_types = array(
			'css' => 'text/css',
			'js' => 'text/javascript'
		);
		
		list($uri, $type) = explode('.', $uri);
		$segments = explode('/', $uri);

		$asset = Layout::where_name(implode('/', array_slice($segments, 1)))->first();
		return Response::make($asset->content, 200, array('Content-Type' => $content_types[$type]));
	}

}