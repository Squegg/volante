<?php

class Add_Language_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('languages', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('language_key')->unique('UQ_language_key');
			$table->string('name');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('languages', function($table)
		{
			$table->drop();
		});
	}

}