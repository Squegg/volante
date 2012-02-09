<div id="main">
	<div class="page-header">
		<h1><?= __('admin_layouts.add.title') ?></h1>
	</div>
	<?= Form::open('admin/layouts/add', 'POST', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', __('admin_layouts.add.form.name'), array(Input::old('name')), array('error' => $errors->first('name'))) ?>
		<?= Form::field('select', 'type', __('admin_layouts.add.form.type'), array(array_merge(array(''), Layout::$types)), array('error' => $errors->first('type'))) ?>
		<?= Form::field('textarea', 'content', __('admin_layouts.add.form.content'), array(Input::old('content'), array('style' => 'width: 770px; height: 350px')), array('error' => $errors->first('content'))) ?>
		<?= Form::actions(array(Form::submit(__('admin_layouts.add.form.submit'), array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>