<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<h3 class="brand">
				<a href="#">VolanteCMS</a>
			</h3>

			<?= HTML::menu($menu) ?>

			<?php if(Auth::user()): ?>
			<div class="btn-group pull-right">
				<?= HTML::link('admin/account/profile', '<b>'.Auth::user()->name.'</b>', array('class' => 'btn')) ?>
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu pull-right">
					<li><?= HTML::link('admin/account/edit', '<i class="icon-pencil"></i> '.__('admin.account.edit')) ?></li>
					<li class="divider"></li>
					<li><?= HTML::link('admin/account/logout', '<i class="icon-arrow-right"></i> '.__('admin.account.logout')) ?></li>
				</ul>
			</div>
			<?php endif ?>
		</div>
	</div>
</div>
<div class="container">