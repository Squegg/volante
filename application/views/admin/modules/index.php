<div id="main">
	<div class="page-header">
		<h1>Modules</h1>
	</div>
	<?php Notification::show() ?>
	<?php if(count($modules->results) > 0): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Homepage</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($modules->results as $module): ?>
				<tr>
					<td>
						<h2><?= $remote_modules[$module->module_key]['name'] ?></h2>
					</td>
					<td>
						<?= HTML::link($remote_modules[$module->module_key]['provider_url'], 'Visit homepage', array('target' => '_blank')) ?>
					</td>
					<td width="190" style="text-align:right">
						<?= ! $module->is_latest($module->module_key, $module->version) ? HTML::link('admin/modules/update/'.$module->module_key, '<i class="icon check"></i> Update', array('class' => 'btn')) : '' ?>
						<?php echo Authority::can('delete', 'Module', $module) ? '&nbsp; '.HTML::link('admin/modules/delete/'.$module->module_key, 'Uninstall', array('class' => 'btn danger')) : ''; ?>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<div class="pull-left">
			<?= $modules->links() ?>
		</div>
	<?php else: ?>
		<div class="well">
			Er zijn geen modules gevonden...
		</div>
	<?php endif ?>
	<div class="pull-right">
		<?= HTML::link('admin/modules/add', 'Install module', array('class' => 'btn large primary')) ?>
	</div>
</div>