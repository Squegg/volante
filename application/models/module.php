<?php
class Module extends Model {

	public static $timestamps = true;

	public $rules = array(
		'module' => 'required'
	);

	/**
	 * The root of the CMS module API.
	 *
	 * @var string
	 */
	public static $api = 'http://84.30.117.40/modules/api/modules/';

	public static function remote($module_key = '')
	{
		$json = file_get_contents(static::$api.$module_key);

		return json_decode($json, true);
	}

	public function is_latest($module_key, $version)
	{
		$module = static::remote($module_key);

		return (float) $version == (float) $module['version'];
	}

	public function install($module_key)
	{
		$module_data = static::remote($module_key);



		$this->module_key = $module_key;
		$this->version = $module_data['version'];
		$this->save();
	}

}