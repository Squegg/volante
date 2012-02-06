<?php

class Add_Settings_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settings', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('setting_key');
			$table->string('setting_value');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settings', function($table)
		{
			$table->drop();
		});
	}

}