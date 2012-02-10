<div id="main">
	<div class="page-header">
		<h1><?= __('admin_modules.delete.title') ?></h1>
	</div>
	<div class="well">
		<?= __('admin_modules.delete.message', array($module->module_key)) ?>
	</div>
	<?= Form::open('admin/modules/delete/'.$module->id, 'PUT') ?>
		<?= Form::actions(array(Form::submit(__('admin_modules.delete.confirm'), array('class' => 'btn btn-large btn-danger')), ' &nbsp; '.HTML::link('admin/modules', __('admin_modules.delete.backtoindex'), array('class' => 'btn btn-large')))) ?>
	<?= Form::close() ?>
</div>