<div id="main">
	<div class="page-header">
		<div class="pull-right">
			<?= Form::open('admin/layouts', 'GET') ?>
				<?= Form::input('text', 'q', Input::get('q')) ?> &nbsp;
				<button type="submit" class="btn primary"><i class="icon search"></i></button>
			<?= Form::close() ?>
		</div>
		<h1>Layouts</h1>
	</div>
	<?php Notification::show() ?>
	<?php if(count($layoutgroups) > 0): ?>
		<?php foreach($layoutgroups as $layoutgroup): if(count($layoutgroup->layouts) > 0): ?>
		<h2><?= $layoutgroup->name ?></h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Type</th>
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
					<td width="120" style="text-align:right">
						<?= HTML::link('admin/layouts/edit/'.$layout->id, '<i class="icon pencil"></i>', array('class' => 'btn small')) ?>
						<?php echo Authority::can('delete', 'Layout', $layout) ? '&nbsp; '.HTML::link('admin/layouts/delete/'.$layout->id, 'Delete', array('class' => 'btn danger')) : ''; ?>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<?php endif; endforeach ?>
	<?php else: ?>
		<div class="well">
			Er zijn geen layouts gevonden...
		</div>
	<?php endif ?>
	<div class="pull-right">
		<?= HTML::link('admin/layouts/add', 'Add layout', array('class' => 'btn large primary')) ?>
	</div>
</div>