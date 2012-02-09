<div id="main">
	<div class="page-header">
		<h1><?= __('admin_account.edit.title') ?></h1>
	</div>
	<?= Form::open('admin/account/edit/'.$account->id, 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', __('admin_account.edit.form.name'), array(Input::old('name', $account->name)), array('error' => $errors->first('name'))) ?>
		<?= Form::field('text', 'email', __('admin_account.edit.form.email'), array(Input::old('email', $account->email)), array('error' => $errors->first('email'))) ?>
		<?= Form::field('select', 'language_id', __('admin_account.edit.form.language'), array($languages, Auth::user()->language_id, array('error' => $errors->first('type')))) ?>
		<?= Form::field('text', 'password', __('admin_account.edit.form.password'), array(), array('error' => $errors->first('password'), 'warning' => __('admin_account.edit.form.password_warning'))) ?>
		<?= Form::actions(array(Form::submit(__('admin_account.edit.form.submit'), array('class' => 'btn-primary btn-large')))) ?>
	<?= Form::close() ?>
</div>