<div id="main">
	<div class="page-header">
		<h1>Login</h1>
	</div>
	<?= Form::open('account/login', 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'email', 'E-mail address', array(Input::old('email')), array('error' => $errors->first('email'))) ?>
		<?= Form::field('password', 'password', 'Password', array(), array('error' => $errors->first('password'))) ?>
		<?= Form::actions(array(Form::submit('Login', array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>