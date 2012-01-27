<div id="main">
	<div class="page-header">
		<h1>Accounts</h1>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Roles</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($accounts as $account): ?>
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
						echo '
							<b>'.$role->lang()->name.'</b><br>';
					}
					?>
				</td>
				<td width="120" style="text-align:right">
					<?= HTML::link('admin/accounts/edit/'.$account->id, '<i class="icon pencil"></i>', array('class' => 'btn small')) ?>
					<?php echo Authority::can('delete', 'Account', $account) ? '&nbsp; '.HTML::link('admin/accounts/delete/'.$account->id, 'Delete', array('class' => 'btn danger')) : ''; ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<div class="pull-right">
		<?= HTML::link('admin/accounts/add', 'Add account', array('class' => 'btn large primary')) ?>
	</div>
</div>