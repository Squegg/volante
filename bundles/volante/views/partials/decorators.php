<div id="volante-elements">
    <?php foreach($decorators as $decorator): ?>
    	<div id="volante-decorator-<?= strtolower($decorator->name) ?>">
    		<?= str_replace(Config::get('application.key'), '{splitter}', $decorator->content) ?>
    	</div>
    <?php endforeach ?>
</div>