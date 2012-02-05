<?php

class Add_Module_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('modules', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->float('version');
			$table->string('module_key');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('modules', function($table)
		{
			$table->drop();
		});
	}

}