<div id="main">
	<div class="page-header">
		<h1><?= __('admin_layouts.delete.title') ?></h1>
	</div>
	<div class="well">
		<?= __('admin_layouts.delete.message', array($layout->name)) ?>
	</div>
	<?= Form::open('admin/layouts/delete/'.$layout->id, 'PUT') ?>
		<?= Form::actions(array(Form::submit(__('admin_layouts.delete.confirm'), array('class' => 'btn btn-large btn-danger')), ' &nbsp; '.HTML::link('admin/layouts', __('admin_layouts.delete.backtoindex'), array('class' => 'btn btn-large')))) ?>
	<?= Form::close() ?>
</div>