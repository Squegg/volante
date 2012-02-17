<?php
class Parser {
	
	public static $prefix = '_';

	public static function handle_partials($content)
	{
		preg_match_all('/{partial::([a-zA-Z_]+)\s?([a-zA-Z0-9_= "\']+)?/', $content, $matches);
		if(count($matches) > 0)
		{
			for($i = 0; $i < count($matches[0]); $i++)
			{
				$partial = static::handle_partials(Layout::raw_where('LOWER(name) = \''.strtolower($matches[1][$i]).'\'')->first()->content);
				$content = str_replace($matches[0][$i].'}', $partial, $content);
			}
		}
		return $content;
	}

	public static function parse($content, $object = null)
	{
		$content = static::handle_partials($content);
		preg_match_all('/{([a-zA-Z]+)::([a-zA-Z_]+)\s?([a-zA-Z0-9_= "\']+)?/', $content, $matches);

		$tag_types = array();
		for($i = 0; $i < count($matches[0]); $i++)
		{
			$arguments = array();
			$raw_arguments = explode(' ', $matches[3][$i]);
			$tag = $matches[0][$i].'}';
			$method = $matches[1][$i];
			$action = $matches[2][$i];
			foreach ($raw_arguments as $raw_argument)
			{
				$raw_argument = explode('=', $raw_argument);
				if(count($raw_argument) > 1)
				{
					list($key, $value) = $raw_argument;
					$arguments[$key] = rtrim(ltrim($value, '"'), '"');
				}
			}

			$method = static::$prefix.$method;
			$content = str_replace($tag, static::$method($action, $arguments, $object), $content);
		}

		return $content;
	}

	protected static function _site($action, $arguments)
	{
		switch($action)
		{
			case 'name':
				return 'Volante!';
			break;
			case 'sitemap':
				return '';
			break;
			case 'current_url':
			
			break;
			case 'menu':
			
			break;
			case 'sub_menu':

			break;
			case 'link':
				
			break;
			default:
				return '';
			break;
		}
	}

	protected static function _page($action, $arguments, $page)
	{
		return $page->$action;
	}

}