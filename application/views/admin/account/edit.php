<div id="main">
	<?= Form::open('admin/account/edit/'.$account->id, 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', 'Name', array(Input::old('name', $account->name)), array('error' => $errors->first('name'))) ?>
		<?= Form::field('text', 'email', 'E-mail address', array(Input::old('email', $account->email)), array('error' => $errors->first('email'))) ?>
		<?= Form::field('text', 'password', 'New password', array(), array('error' => $errors->first('password'), 'warning' => 'Leave blank if you don\'t want to change your password')) ?>
		<?= Form::actions(array(Form::submit('Save changes', array('class' => 'btn-primary btn-large')))) ?>
	<?= Form::close() ?>
</div>