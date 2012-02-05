<div id="main">
	<div class="page-header">
		<h1>Edit layout</h1>
	</div>
	<?= Form::open('admin/layouts/edit/'.$layout->id, 'PUT', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', 'Name', array(Input::old('name', $layout->name)), array('error' => $errors->first('name'))) ?>
		<?= Form::field('select', 'type', 'Type', array(array_merge(array(''), Layout::$types), array($layout->type)), array('error' => $errors->first('type'))) ?>
		<?= Form::field('textarea', 'content', 'Content', array(Input::old('content', $layout->content), array('style' => 'width: 770px; height: 350px')), array('error' => $errors->first('content'))) ?>
		<?= Form::actions(array(Form::submit('Save changes', array('class' => 'btn large primary')))) ?>
	<?= Form::close() ?>
</div>