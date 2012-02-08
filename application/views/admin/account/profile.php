<div id="main">
	<div class="page-header">
		<h1>Profile</h1>
	</div>
	<?php Notification::show() ?>
	<table class="table table-striped table-condensed">
		<tbody>
			<tr>
				<th>Name</th>
				<td><?= Auth::user()->name ?></td>
			</tr>
			<tr>
				<th>E-mail address</th>
				<td><?= Auth::user()->email ?></td>
			</tr>
		</tbody>
	</table>
</div>