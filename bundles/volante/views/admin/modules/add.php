<div id="main">
	<div class="page-header">
		<h1><?= __('admin_modules.add.title') ?></h1>
	</div>
	<?php Notification::show() ?>
	<?= Form::open('admin/modules/add', 'POST') ?>
		<div id="scrollbox">
			<table class="table">
				<thead>
					<tr>
						<th><i class="icon-check"></i></th>
						<th><?= __('admin_modules.add.table.name') ?></th>
						<th><?= __('admin_modules.add.table.version') ?></th>
						<th><?= __('admin_modules.add.table.homepage') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($modules as $module_key => $module): ?>
					<tr>
						<td><input type="checkbox" name="module[<?= $module_key ?>]"></td>
						<td><?= $module['name'] ?></td>
						<td>V <?= $module['version'] ?></td>
						<td><a href="<?= $module['repository_url'] ?>" target="_blank"><?= __('admin_modules.add.table.visithomepage') ?></a></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<?= Form::actions(array(Form::submit(__('admin_modules.add.form.submit'), array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>