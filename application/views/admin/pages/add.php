<div id="main">
	<div class="page-header">
		<h1>Add page</h1>
	</div>
	<?= Form::open('admin/pages/add', 'POST', array('class' => 'form-horizontal')) ?>
	<div class="tabbable">
		<ul class="nav nav-tabs">
		<?php $i = 0; foreach($languages as $language): $i++; ?>
			<li<?= $i == 1 ? ' class="active"':''; ?>><a href="#<?= $language->language_key ?>" data-toggle="tab"><?= $language->name ?></a></li>
		<?php endforeach ?>
		</ul>
	    <div class="tab-content">
	    	<?php $i = 0; foreach($languages as $language): $i++; ?>
		    <div class="tab-pane<?= $i == 1 ? ' active':''; ?>" id="<?= $language->language_key ?>">
			    <fieldset>
			    	<legend>Meta</legend>
			    	<?= Form::field('text', 'meta_title['.$language->language_key.']', 'Title', array(Input::old('meta_title'), array('style' => 'width: 770px')), array('error' => $errors->first('meta_title'))) ?>
			    	<?= Form::field('textarea', 'meta_description['.$language->language_key.']', 'Description', array(Input::old('meta_description'), array('style' => 'height: 60px; width: 770px')), array('error' => $errors->first('meta_description'))) ?>
			    	<?= Form::field('textarea', 'meta_keywords['.$language->language_key.']', 'Keywords', array(Input::old('meta_keywords'), array('style' => 'height: 60px; width: 770px')), array('error' => $errors->first('meta_keywords'))) ?>
			    </fieldset>
			    <fieldset>
			    	<legend>Page</legend>
			    	<?= Form::field('text', 'menu['.$language->language_key.']', 'Menu', array(Input::old('menu'), array('style' => 'width: 770px')), array('error' => $errors->first('menu'))) ?>
			    	<?= Form::field('text', 'url['.$language->language_key.']', 'URL', array(Input::old('url'), array('style' => 'width: 770px')), array('error' => $errors->first('url'))) ?>
			    	<?= Form::field('text', 'title['.$language->language_key.']', 'Title', array(Input::old('title'), array('style' => 'width: 770px')), array('error' => $errors->first('title'))) ?>
			    	<?= Form::field('textarea', 'content['.$language->language_key.']', 'Content', array(Input::old('content'), array('style' => 'height: 350px; width: 770px')), array('error' => $errors->first('content'))) ?>
			    </fieldset>
		    </div>
		    <?php endforeach ?>
	    </div>
    </div>
   	<?= Form::actions(array(Form::submit('Add page', array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>