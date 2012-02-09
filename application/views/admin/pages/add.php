<div id="main">
	<div class="page-header">
		<h1>Add page</h1>
	</div>
	<?= Form::open('admin/pages/add', 'POST', array('class' => 'form-horizontal')) ?>
	<div class="tabbable">
		<?= Form::field('checkbox', 'online', 'Online', array(Input::old('online'), array('checked' => 'checked'))) ?>
		<?= Form::field('checkbox', 'hidden', 'Hide from navigation', array(Input::old('hidden'))) ?>
		<?= Form::field('checkbox', 'homepage', 'This is the homepage', array(Input::old('homepage'))) ?>
		<br>
		<ul class="nav nav-tabs">
			<?php $i = 0; foreach($languages as $language): $i++; ?>
			<li<?= $i == 1 ? ' class="active"':''; ?>>
				<a href="#<?= $language->language_key ?>" data-toggle="tab"><?= $language->name ?></a>
			</li>
			<?php endforeach ?>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					Add Language
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="#"><i class="icon-plus"></i> &nbsp;English</a>
					</li>
					<li>
						<a href="#"><i class="icon-plus"></i> &nbsp;Spanish</a>
					</li>
				</ul>
			</li>
		</ul>
		<div class="tab-content">
			<?php $i = 0; foreach($languages as $language): $i++; $old = Input::old($language->language_key); ?>
			<div class="tab-pane<?= $i == 1 ? ' active':''; ?>" id="<?= $language->language_key ?>">
				<fieldset>
					<legend>Meta</legend>
					<?= Form::field('text', $language->language_key.'[meta_title]', 'Title', array($old['meta_title'], array('style' => 'width: 770px')), array('error' => $errors[$language->language_key]->first('meta_title'))) ?>
					<?= Form::field('textarea', $language->language_key.'[meta_description]', 'Description', array($old['meta_description'], array('style' => 'height: 60px; width: 770px')), array('error' => $errors[$language->language_key]->first('meta_description'))) ?>
					<?= Form::field('textarea', $language->language_key.'[meta_keywords]', 'Keywords', array($old['meta_keywords'], array('style' => 'height: 60px; width: 770px')), array('error' => $errors[$language->language_key]->first('meta_keywords'))) ?>
				</fieldset>
				<fieldset>
					<legend>Page</legend>
					<?= Form::field('text', $language->language_key.'[menu]', 'Menu', array($old['menu'], array('style' => 'width: 770px')), array('error' => $errors[$language->language_key]->first('menu'))) ?>
					<?= Form::field('text', $language->language_key.'[url]', 'URL', array($old['url'], array('style' => 'width: 770px')), array('error' => $errors[$language->language_key]->first('url'))) ?>
					<?= Form::field('text', $language->language_key.'[title]', 'Title', array($old['title'], array('style' => 'width: 770px')), array('error' => $errors[$language->language_key]->first('title'))) ?>
					<?= Form::field('textarea', $language->language_key.'[content]', 'Content', array($old['content'], array('style' => 'height: 350px; width: 770px')), array('error' => $errors[$language->language_key]->first('content'))) ?>
				</fieldset>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<?= Form::actions(array(Form::submit('Add page', array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>