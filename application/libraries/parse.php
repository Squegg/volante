<?php
class Parse {
	
	public static function page(Page $page)
	{
		$layout = Layout::where_id($page->layout_id)->first()->content;
		return Parser::parse($layout, $page);
	}

	public static function layout($id)
	{
		$layout = Layout::where_id($id)->first()->content;
		return Parser::parse($layout);
	}

	public static function partial($id)
	{
		$layout = Layout::where_id($id)->first()->content;
		return Parser::parse($layout, $raw = true);
	}

}