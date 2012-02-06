<div id="main">
	<div class="page-header">
		<h1>Are you sure?</h1>
	</div>
	<div class="well">
		You are about to uninstall the module named "<?= $module->module_key ?>". <b>If you do, there is no turning back!</b>
	</div>
	<?= Form::open('admin/modules/delete/'.$module->module_key, 'PUT') ?>
		<?= Form::actions(array(Form::submit('Uninstall module', array('class' => 'btn btn-large btn-danger')), ' &nbsp; '.HTML::link('admin/accounts', 'Nope, I changed my mind', array('class' => 'btn btn-large')))) ?>
	<?= Form::close() ?>
</div>