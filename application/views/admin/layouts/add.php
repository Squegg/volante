<div id="main">
	<div class="page-header">
		<h1>Add layout</h1>
	</div>
	<?= Form::open('admin/layouts/add', 'POST', array('class' => 'form-horizontal')) ?>
		<?= Form::field('text', 'name', 'Name', array(Input::old('name')), array('error' => $errors->first('name'))) ?>
		<?= Form::field('select', 'type', 'Type', array(array_merge(array(''), Layout::$types)), array('error' => $errors->first('type'))) ?>
		<?= Form::field('textarea', 'content', 'Content', array(Input::old('content'), array('style' => 'width: 770px; height: 350px')), array('error' => $errors->first('content'))) ?>
		<?= Form::actions(array(Form::submit('Add layout', array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>