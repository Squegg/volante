<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<h3 class="brand">
				<a href="#">LaraCMS</a>
			</h3>

			<?= HTML::menu($menu) ?>

			<div class="btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<b>English</b> / Change language &nbsp;
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu pull-right">
					<li><?= HTML::link('set_language/en?redirect='.URI::current(), 'English') ?></li>
					<li><?= HTML::link('set_language/nl?redirect='.URI::current(), 'Nederlands') ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">