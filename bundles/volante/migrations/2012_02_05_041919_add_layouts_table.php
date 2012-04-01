<?php

class Add_Layouts_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('layouts', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('layoutgroup_id');
			$table->string('name');
			$table->string('type');
			$table->text('content');
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
		Schema::table('layouts', function($table)
		{
			$table->drop();
		});
	}

}