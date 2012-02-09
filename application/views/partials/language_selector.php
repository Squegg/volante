<ul class="nav nav-tabs language-selector">
	<?php foreach(Session::get('admin.languages') as $id => $name): ?>
		<?php if($id == Session::get('admin.settings.default_language_id')): ?>
			<li class="active" id="default">
				<a href="#<?= $id ?>" data-toggle="tab"><?= $name ?></a>
			</li>
		<?php else: ?>
			<li class="hide" id="tab_<?= $id ?>">
				<a href="#<?= $id ?>" data-id="<?= $id ?>" data-toggle="tab"><?= $name ?> <i class="icon-trash"></i></a>
			</li>
		<?php endif ?>
	<?php endforeach ?>
	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			Add Language
			<b class="caret"></b>
		</a>
		<ul class="dropdown-menu">
			<?php foreach(Session::get('admin.languages') as $id => $name): if(Session::get('admin.settings.default_language_id') != $id): ?>
			<li>
				<a href="#<?= $id ?>" data-id="<?= $id ?>"><i class="icon-plus"></i> &nbsp;<?= $name ?></a>
			</li>
			<?php endif; endforeach ?>
		</ul>
	</li>
</ul>