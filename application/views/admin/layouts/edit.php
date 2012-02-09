<div id="main">
	<div class="page-header">
		<h1><?= __('admin_layouts.edit.title') ?></h1>
	</div>
	<?= Form::open('admin/layouts/edit/'.$layout->id, 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', __('admin_layouts.edit.form.name'), array(Input::old('name', $layout->name)), array('error' => $errors->first('name'))) ?>
		<?= Form::field('select', 'type', __('admin_layouts.edit.form.type'), array(array_merge(array(''), Layout::$types), array($layout->type)), array('error' => $errors->first('type'))) ?>
		<?= Form::field('textarea', 'content', __('admin_layouts.edit.form.content'), array(Input::old('content', $layout->content), array('style' => 'width: 770px; height: 350px')), array('error' => $errors->first('content'))) ?>
		<?= Form::actions(array(Form::submit(__('admin_layouts.edit.form.submit'), array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>