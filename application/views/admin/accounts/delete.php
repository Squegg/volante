<div id="main">
	<div class="page-header">
		<h1><?= __('admin_accounts.delete.title') ?></h1>
	</div>
	<div class="well">
		<?= __('admin_accounts.delete.message', array($account->name, $account->email)) ?>
	</div>
	<?= Form::open('admin/accounts/delete/'.$account->id, 'PUT') ?>
		<?= Form::actions(array(Form::submit(__('admin_accounts.delete.confirm'), array('class' => 'btn btn-danger btn-large')), ' &nbsp; '.HTML::link('admin/accounts', __('admin_accounts.delete.backtoindex'), array('class' => 'btn btn-large')))) ?>
	<?= Form::close() ?>
</div>