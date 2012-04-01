<div id="main">
	<div class="page-header">
		<h1><?= __('admin_account.profile.title') ?></h1>
	</div>
	<?php Notification::show() ?>
	<table class="table table-striped table-condensed">
		<tbody>
			<tr>
				<th><?= __('admin_account.profile.data.name') ?></th>
				<td><?= Auth::user()->name ?></td>
			</tr>
			<tr>
				<th><?= __('admin_account.profile.data.email') ?></th>
				<td><?= Auth::user()->email ?></td>
			</tr>
			<tr>
				<th><?= __('admin_account.profile.data.language') ?></th>
				<td><?= $language ?></td>
			</tr>
		</tbody>
	</table>
</div>