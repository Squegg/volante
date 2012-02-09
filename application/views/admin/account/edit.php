<div id="main">
	<div class="page-header">
		<h1><?= __('admin_account.edit.title') ?></h1>
	</div>
	<?= Form::open('admin/account/edit/'.$account->id, 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', 'Name', array(Input::old('name', $account->name)), array('error' => $errors->first('name'))) ?>
		<?= Form::field('text', 'email', 'E-mail address', array(Input::old('email', $account->email)), array('error' => $errors->first('email'))) ?>
		<?= Form::field('select', 'language_id', 'Language', array($languages, Auth::user()->language_id, array('error' => $errors->first('type')))) ?>
		<?= Form::field('text', 'password', 'New password', array(), array('error' => $errors->first('password'), 'warning' => 'Leave blank if you don\'t want to change your password')) ?>
		<?= Form::actions(array(Form::submit('Save changes', array('class' => 'btn-primary btn-large')))) ?>
	<?= Form::close() ?>
</div>