<?php

class Add_Cms_Tables {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pages', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->boolean('homepage');
			$table->boolean('online');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});

		Schema::table('page_lang', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('page_id');
			$table->integer('language_id');
			$table->string('uri');
			$table->boolean('active');
			$table->string('meta_title');
			$table->string('meta_keyword');
			$table->string('meta_description');
			$table->string('title');
			$table->text('content');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});

		Schema::table('regions', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('page_id');
			$table->integer('language_id');
			$table->boolean('active');
			$table->text('content');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});

		Schema::table('assets', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('uri');
			$table->string('name');
			$table->string('content_type');
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
		Schema::table('pages', function($table)
		{
			$table->drop();
		});

		Schema::table('page_lang', function($table)
		{
			$table->drop();
		});

		Schema::table('regions', function($table)
		{
			$table->drop();
		});

		Schema::table('assets', function($table)
		{
			$table->drop();
		});
	}

}