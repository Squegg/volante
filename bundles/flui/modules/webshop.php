<?php namespace FlUI\Modules;

use Laravel\Auth;
use FlUI\Entities\Module;

use FlUI\Entities\HTML\Table;
use FlUI\Entities\HTML\Legend;
use FlUI\Entities\HTML\Button;

use FlUI\Entities\Form\Containers\MultiLanguage;
use FlUI\Entities\Form\Containers\Actions;

use FlUI\Entities\Form\Fields\CheckBox;
use FlUI\Entities\Form\Fields\Select;
use FlUI\Entities\Form\Fields\Text;
use FlUI\Entities\Form\Fields\TextArea;

class Webshop extends Module {
	
	public function index()
	{
		return array(
			new Table(
				
			)
		);
	}

	public function add()
	{
		$layout_id_options = array();

		//return new Form($config, $fields);

		return array(
			new CheckBox('online', 1),
			new CheckBox('hidden', 1),
			new CheckBox('homepage', 1),
			new Select('layout_id', $layout_id_options),
			new MultiLanguage('all', Auth::user()->language_id, 
				array(
					new Legend('meta'),
					new Text('meta_title', 'required'),
					new Text('meta_description'),
					new Text('meta_keywords'),
					new Legend('page'),
					new Text('menu', 'required'),
					new Text('url', 'required'),
					new Text('title', 'required'),
					new TextArea('content')
				)
			),
			new Actions(
				array(
					new Button('submit', 'submit'),
				)
			)
		);
	}

	public function edit()
	{
		$this->add();
	}

	public function delete()
	{
		return  array(
			new Actions(
				array(
					new Button('submit', 'submit'),
				)
			)
		);
	}

}