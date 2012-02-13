<div id="main">
	<div class="page-header">
		<h1><?= __('admin_layouts.add.title') ?></h1>
	</div>
	<?= Form::open('admin/layouts/add', 'POST', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', __('admin_layouts.add.form.name'), array(Input::old('name')), array('error' => $errors->first('name'))) ?>
		<?= Form::field('select', 'type', __('admin_layouts.add.form.type'), array(Layout::$types), array('error' => $errors->first('type'))) ?>
		<div class="control-group" style="height: 350px">
			<label class="control-label" for="type"><?= __('admin_layouts.add.form.content') ?></label>
			<div class="controls">
				<div id="editor" style="height: 350px; width: 770px"></div><div style="clear:both"></div>
			</div>
		</div>
		<?= Form::field('textarea', 'content', __('admin_layouts.add.form.content'), array(Input::old('content'), array('style' => 'width: 770px; height: 350px')), array('error' => $errors->first('content'))) ?>
		<?= Form::actions(array(Form::submit(__('admin_layouts.add.form.submit'), array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>