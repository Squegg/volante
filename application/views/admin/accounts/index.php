<div id="main">
	<div class="page-header">
		<div class="pull-right">
			<?= Form::open('admin/accounts', 'GET', array('class' => 'form-inline')) ?>
				<?= Form::input('text', 'q', Input::get('q')) ?> &nbsp;
				<button type="submit" class="btn btn-primary"><i class="icon-white icon-search"></i></button>
			<?= Form::close() ?>
		</div>
		<h1><?= __('admin_accounts.index.title') ?></h1>
	</div>
	<?php Notification::show() ?>
	<?php if(count($accounts->results) > 0): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th><?= HTML::sort_link('admin/accounts', 'name', __('admin_accounts.index.table.name')) ?></th>
					<th><?= HTML::sort_link('admin/accounts', 'email', __('admin_accounts.index.table.email')) ?></th>
					<th><?= __('admin_accounts.index.table.roles') ?></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($accounts->results as $account): ?>
				<tr>
					<td>
						<h2><?= $account->name ?></h2>
					</td>
					<td>
						<?= $account->email ?>
					</td>
					<td>
						<?php
						foreach($account->roles as $role)
						{

							echo '<b>'.$roles_lang[$role->id]->name.'</b><br>';
						}
						?>
					</td>
					<td width="120" class="last">
						<?= HTML::link('admin/accounts/edit/'.$account->id, '<i class="icon-pencil"></i>', array('class' => 'btn')) ?>
						<?php echo Authority::can('delete', 'Account', $account) ? '&nbsp; '.HTML::link('admin/accounts/delete/'.$account->id, '<i class="icon-white icon-trash"></i>', array('class' => 'btn btn-danger')) : ''; ?>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<div class="pull-left">
			<?= $accounts->links() ?>
		</div>
	<?php else: ?>
		<div class="well">
			<?= __('admin_accounts.no_accounts') ?>
		</div>
	<?php endif ?>
	<div class="pull-right">
		<?= HTML::link('admin/accounts/add', __('admin_accounts.index.add'), array('class' => 'btn btn-primary btn-large')) ?>
	</div>
	<div class="clear"></div>
</div>