<?php

class Fill_Database {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		$english = new Language;
		$english->language_key = 'en';
		$english->name = 'English';
		$english->save();

		$dutch = new Language;
		$dutch->language_key = 'nl';
		$dutch->name = 'Nederlands';
		$dutch->save();

		$account = new Account;
		$account->email = 'admin@admin.com';
		$account->password = '$2a$08$P/FbYAoXjLhz2hKcoE75L.TIPEU9dKpcyJOz5w82XrD8i1lXz3UUi';
		$account->name = 'Sir. Mayalot';
		$account->language_id = $english->id;
		$account->save();

		$role = new Role;
		$role->key = 'superadmin';
		$role->save();

		DB::table('accounts_roles')->insert(
			array(
				'account_id' => $account->id,
				'role_id' => $role->id
			)
		);
		
		$layoutgroup = new LayoutGroup;
		$layoutgroup->name = 'Main';
		$layoutgroup->save();

		$role_lang = new RoleLang;
		$role_lang->role_id = $role->id;
		$role_lang->language_id = $english->id;
		$role_lang->name = 'Administrator';
		$role_lang->description = 'King of the castle';
		$role_lang->save();

		$settings = new Setting;
		$settings->default_language_id = $english->id;
		$settings->save();
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}