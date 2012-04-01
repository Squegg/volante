<div id="main">
	<div class="page-header">
		<h1><?= __('admin_layouts.edit.title') ?></h1>
	</div>
	<?= Form::open('admin/layouts/edit/'.$layout->id, 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', __('admin_layouts.edit.form.name'), array(Input::old('name', $layout->name)), array('error' => $errors->first('name'))) ?>
		<?= Form::field('select', 'type', __('admin_layouts.edit.form.type'), array(Layout::$types, Input::old('type', $layout->type)), array('error' => $errors->first('type'))) ?>
		<div id="normal">
			<div class="control-group" style="height: 350px">
				<label class="control-label" for="type"><?= __('admin_layouts.add.form.content') ?></label>
				<div class="controls">
					<div class="editor" id="content_editor" style="height: 350px; width: 770px"></div><div style="clear:both"></div>
				</div>
			</div>		
			<?= Form::field('textarea', 'content', __('admin_layouts.edit.form.content'), array(Input::old('content', $layout->content), array('style' => 'width: 770px; height: 350px')), array('error' => $errors->first('content'))) ?>
		</div>
		<div id="split">
			<div class="control-group" style="height: 350px">
				<label class="control-label" for="type"><?= __('admin_layouts.add.form.before') ?></label>
				<div class="controls">
					<div class="editor" id="before_editor" style="height: 350px; width: 770px"></div><div style="clear:both"></div>
				</div>
			</div>
			<?= Form::field('textarea', 'before', __('admin_layouts.add.form.before'), array(Input::old('before', $layout->before), array('style' => 'width: 770px; height: 350px')), array('error' => $errors->first('before'))) ?>

			<div class="control-group" style="height: 350px">
				<label class="control-label" for="type"><?= __('admin_layouts.add.form.after') ?></label>
				<div class="controls">
					<div class="editor" id="after_editor" style="height: 350px; width: 770px"></div><div style="clear:both"></div>
				</div>
			</div>
			<?= Form::field('textarea', 'after', __('admin_layouts.add.form.after'), array(Input::old('after', $layout->after), array('style' => 'width: 770px; height: 350px')), array('error' => $errors->first('after'))) ?>
		</div>
		<?= Form::actions(array(Form::submit(__('admin_layouts.edit.form.submit'), array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>