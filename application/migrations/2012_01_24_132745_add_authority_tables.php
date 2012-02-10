<?php

class Add_Authority_Tables {

	public function up()
	{
		Schema::table('accounts', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->string('name');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});

		Schema::table('roles', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('key');
		});

		Schema::table('role_lang', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('role_id');
			$table->integer('language_id');
			$table->string('name');
			$table->string('description');
		});

		Schema::table('accounts_roles', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('account_id');
			$table->integer('role_id');
		});
	}

	public function down()
	{
		Schema::table('accounts', function($table)
		{
			$table->drop();
		});

		Schema::table('roles', function($table)
		{
			$table->drop();
		});

		Schema::table('role_lang', function($table)
		{
			$table->drop();
		});

		Schema::table('accounts_roles', function($table)
		{
			$table->drop();
		});
	}

}