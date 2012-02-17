<?php
$test = '
{site::name}
{site::sitemap}
{site::current_url}
{site::menu from="nl" depth="2"}
{site::sub_menu}
{site::link to="en/company/about-us"}
{site::link to_module="webshop::product:nivea-for-man-shower-gel-40-percent-off"}

{page::meta_title}

{partial::header}
{partial::menu}
{partial::footer}
';

preg_match_all('/{([a-zA-Z]+)::([a-zA-Z_]+)\s?([a-zA-Z0-9_= "\']+)?/', $test, $results);

$tags = array();
for($i = 0; $i < count($results[0]); $i++) {
	$arguments = array();
	$keyvalues = explode(' ', $results[3][$i]);
	foreach ($keyvalues as $keyvalue)
	{
		$keyvalue = explode('=', $keyvalue);
		if(count($keyvalue) > 1) {
			list($key, $value) = $keyvalue;
			$arguments[$key] = rtrim(ltrim($value, '"'), '"');
		}
	}

	$tags[$results[0][$i].'}'] = array(
		'key' => $results[1][$i],
		'value' => $results[2][$i],
		'arguments' => $arguments
	);
}

var_dump($tags);
