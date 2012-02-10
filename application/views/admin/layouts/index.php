<div id="main">
	<div class="page-header">
		<div class="pull-right">
			<?= Form::open('admin/layouts', 'GET', array('class' => 'form-inline')) ?>
				<?= Form::input('text', 'q', Input::get('q')) ?> &nbsp;
				<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i></button>
			<?= Form::close() ?>
		</div>
		<h1><?= __('admin_layouts.index.title') ?></h1>
	</div>
	<?php Notification::show() ?>
	<?php if(count($layoutgroups) > 0): ?>
		<?php foreach($layoutgroups as $layoutgroup): if(count($layoutgroup->layouts) > 0): ?>
		<h2 class="grey-title"><?= $layoutgroup->name ?></h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="400"><?= __('admin_layouts.index.table.name') ?></th>
					<th><?= __('admin_layouts.index.table.type') ?></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($layoutgroup->layouts as $layout): ?>
				<tr>
					<td>
						<h2><?= $layout->name ?></h2>
					</td>
					<td>
						<?= $layout->type ?>
					</td>
					<td width="120" class="last">
						<?= HTML::link('admin/layouts/edit/'.$layout->id, '<i class="icon-pencil"></i>', array('class' => 'btn')) ?>
						<?php echo Authority::can('delete', 'Layout', $layout) ? '&nbsp; '.HTML::link('admin/layouts/delete/'.$layout->id, '<i class="icon-trash icon-white"></i>', array('class' => 'btn btn-danger')) : ''; ?>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<?php endif; endforeach ?>
	<?php else: ?>
		<div class="well">
			<?= __('admin_layouts.index.no_results') ?>
		</div>
	<?php endif ?>
	<div class="pull-right">
		<?= HTML::link('admin/layouts/add', __('admin_layouts.index.add'), array('class' => 'btn btn-large btn-primary')) ?>
	</div>
	<div class="clear"></div>
</div>