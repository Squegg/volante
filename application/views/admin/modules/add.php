<div id="main">
	<div class="page-header ">
		<h1>Install module</h1>
	</div>
	<?php Notification::show() ?>
	<?= Form::open('admin/modules/add', 'POST') ?>
		<div id="scrollbox">
			<table class="table">
				<thead>
					<tr>
						<th><i class="icon check"></i></th>
						<th>Name</th>
						<th>Version</th>
						<th>Homepage</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($modules as $module_key => $module): ?>
					<tr>
						<td><input type="checkbox" name="module[<?= $module_key ?>]"></td>
						<td><?= $module['name'] ?></td>
						<td>V <?= $module['version'] ?></td>
						<td><a href="<?= $module['repository_url'] ?>" target="_blank">Visit homepage</a></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<?= Form::actions(array(Form::submit('Install selected modules', array('class' => 'btn large primary')))) ?>
	<?= Form::close() ?>
</div>