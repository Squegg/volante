<div id="main">
	<div class="page-header">
		<h1><?= __('admin_accounts.add.title') ?></h1>
	</div>
	<?= Form::open('admin/accounts/add', 'POST', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', __('admin_accounts.add.form.name'), array(Input::old('name')), array('error' => $errors->first('name'))) ?>
		<?= Form::field('text', 'email', __('admin_accounts.add.form.email'), array(Input::old('email')), array('error' => $errors->first('email'))) ?>
		<?= Form::field('select', 'language_id', __('admin_accounts.add.form.language'), array($languages, 1, array('error' => $errors->first('type')))) ?>
		<?= Form::field('password', 'password', __('admin_accounts.add.form.password'), array(), array('error' => $errors->first('password'))) ?>
		<?= Form::field('select', 'role_ids[]', __('admin_accounts.add.form.roles'), array($roles, array(), array('multiple' => 'multiple')), array('error' => $errors->first('role_ids'))) ?>
		<?= Form::actions(array(Form::submit(__('admin_accounts.add.form.submit'), array('class' => 'btn-primary btn-large')))) ?>
	<?= Form::close() ?>
</div>