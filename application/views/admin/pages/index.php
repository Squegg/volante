<div id="main">
	<div class="page-header">
		<div class="pull-right">
			<?= Form::open('admin/pages', 'GET', array('class' => 'form-inline')) ?>
				<?= Form::input('text', 'q', Input::get('q')) ?> &nbsp;
				<button type="submit" class="btn btn-primary"><i class="icon-white icon-search"></i></button>
			<?= Form::close() ?>
		</div>
		<h1>Pages</h1>
	</div>
	<?php Notification::show() ?>
	<?php if(count($pages->results) > 0): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th><?= HTML::sort_link('admin/pages', 'name', 'Name') ?></th>
					<th><?= HTML::sort_link('admin/pages', 'url', 'Email') ?></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($pages->results as $page): ?>
				<tr>
					<td>
						<h2><?= $page->name ?></h2>
					</td>
					<td>
						<?= $page->email ?>
					</td>
					<td width="120" class="last">
						<?= HTML::link('admin/pages/edit/'.$page->id, '<i class="icon-pencil"></i>', array('class' => 'btn')) ?>
						<?php echo Authority::can('delete', 'Page', $page) ? '&nbsp; '.HTML::link('admin/pages/delete/'.$page->id, '<i class="icon-white icon-trash"></i> Delete', array('class' => 'btn btn-danger')) : ''; ?>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<div class="pull-left">
			<?= $pages->links() ?>
		</div>
	<?php else: ?>
		<div class="well">
			No pages found...
		</div>
	<?php endif ?>
	<div class="pull-right">
		<?= HTML::link('admin/pages/add', 'Add page', array('class' => 'btn btn-large btn-primary')) ?>
	</div>
	<div class="clear"></div>
</div>