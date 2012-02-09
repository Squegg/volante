<div id="main">
	<div class="page-header">
		<h1><?= __('admin_accounts.edit.title') ?></h1>
	</div>
	<?= Form::open('admin/accounts/edit/'.$account->id, 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', __('admin_accounts.edit.form.name'), array(Input::old('name', $account->name)), array('error' => $errors->first('name'))) ?>
		<?= Form::field('text', 'email', __('admin_accounts.edit.form.email'), array(Input::old('email', $account->email)), array('error' => $errors->first('email'))) ?>
		<?= Form::field('select', 'language_id', __('admin_accounts.edit.form.language'), array($languages, $account->language_id, array('error' => $errors->first('type')))) ?>
		<?= Form::field('text', 'password', __('admin_accounts.edit.form.password'), array(), array('error' => $errors->first('password'))) ?>
		<?= Form::field('select', 'role_ids[]', __('admin_accounts.edit.form.roles'), array($roles, $active_roles, array('multiple' => 'multiple')), array('error' => $errors->first('password'))) ?>
		<?= Form::actions(array(Form::submit(__('admin_accounts.edit.form.submit'), array('class' => 'btn-primary btn-large')))) ?>
	<?= Form::close() ?>
</div>