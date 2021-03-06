<?php

class Add_Layoutgroups_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('layoutgroups', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('name');
			$table->integer('module_id')->nullable();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('layoutgroups', function($table)
		{
			$table->drop();
		});
	}

}