<div id="main">
	<div class="page-header">
		<h1><?= __('admin_settings.index.title') ?></h1>
	</div>
	<?= Notification::show() ?>
	<?= Form::open('admin/settings/index/', 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('select', 'default_language_id', __('admin_settings.index.form.default_language'), array($languages, $settings->default_language_id, array('error' => $errors->first('type')))) ?>
		<?= Form::actions(array(Form::submit(__('admin_settings.index.form.submit'), array('class' => 'btn-primary btn-large')))) ?>
	<?= Form::close() ?>
</div>