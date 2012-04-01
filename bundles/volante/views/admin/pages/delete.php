<div id="main">
	<div class="page-header">
		<h1>Are you sure?</h1>
	</div>
	<div class="well">
		You are about to delete the page "<?= $page->name ?>". <b>If you do, there is no turning back!</b>
	</div>
	<?= Form::open('admin/pages/delete/'.$page->id, 'PUT') ?>
		<?= Form::actions(array(Form::submit('Delete page', array('class' => 'btn btn-large btn-danger')), ' &nbsp; '.HTML::link('admin/pages', 'Nope, I changed my mind', array('class' => 'btn btn-large')))) ?>
	<?= Form::close() ?>
</div>