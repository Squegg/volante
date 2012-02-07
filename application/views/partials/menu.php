<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<h3 class="brand">
				<a href="#">LaraCMS</a>
			</h3>

			<?= HTML::menu($menu) ?>

			<div class="btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<b><?= Language::where_id(Session::get('language_id'))->first()->name ?></b> / Change language &nbsp;
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu pull-right">
					<?php foreach(Language::all() as $language): ?>
						<li><?= HTML::link('set_language/'.$language->id.'?redirect='.URI::current(), $language->name) ?></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">