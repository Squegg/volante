<div id="main">
	<div class="page-header">
		<h1><?= __('admin_modules.index.title') ?></h1>
	</div>
	<?php Notification::show() ?>
	<?php if(count($modules->results) > 0): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th><?= __('admin_modules.index.table.name') ?></th>
					<th><?= __('admin_modules.index.table.homepage') ?></th>
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
						<?= HTML::link($remote_modules[$module->module_key]['provider_url'], __('admin_modules.index.table.visithomepage'), array('target' => '_blank')) ?>
					</td>
					<td width="190" class="last">
						<?= ! $module->is_latest($module->module_key, $module->version) ? HTML::link('admin/modules/update/'.$module->id, '<i class="icon-check"></i> '.__('admin_modules.index.table.update'), array('class' => 'btn')) : '' ?>
						<?php echo Authority::can('delete', 'Module', $module) ? '&nbsp; '.HTML::link('admin/modules/delete/'.$module->id, '<i class="icon-trash icon-white"></i> '.__('admin_modules.index.table.uninstall'), array('class' => 'btn btn-danger')) : ''; ?>
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
			<?= __('admin_modules.index.no_results') ?>
			Er zijn geen modules gevonden...
		</div>
	<?php endif ?>
	<div class="pull-right">
		<?= HTML::link('admin/modules/add', __('admin_modules.index.add'), array('class' => 'btn btn-large btn-primary')) ?>
	</div>
	<div class="clear"></div>
</div>