<?= View::make('partials.header', $header_data) ?>
<?= View::make('partials.menu', $menu_data) ?>
<div class="container">
	<?= $content ?>
</div>
<?= View::make('partials.footer', $footer_data) ?>