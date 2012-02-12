<div id="main">
	<div class="page-header">
		<h1><?= __('admin_pages.add.title') ?></h1>
	</div>
	<?= Form::open('admin/pages/add', 'POST', array('class' => 'form-horizontal')) ?>
	<div class="tabbable">
		<?= Form::field('checkbox', 'online', __('admin_pages.add.form.online'), array(Input::old('online'), array('checked' => 'checked'))) ?>
		<?= Form::field('checkbox', 'hidden', __('admin_pages.add.form.hidden'), array(Input::old('hidden'))) ?>
		<?= Form::field('checkbox', 'homepage', __('admin_pages.add.form.homepage'), array(Input::old('homepage'))) ?>
		<?= Form::field('select', 'layout_id', __('admin_pages.add.form.layout'), array($layouts)) ?>
		<br>
		<?= HTML::language_selector() ?>
		<div class="tab-content">
			<?php $i = 0; foreach($languages as $language): $i++; $old = Input::old($language->language_key); ?>
			<div class="tab-pane<?= $i == 1 ? ' active':''; ?>" id="<?= $language->id ?>">
				<fieldset>
					<div class="row">
						<legend class="offset2"><?= __('admin_pages.add.form.meta_legend') ?></legend>
					</div>
					<?= Form::field('text', $language->language_key.'[meta_title]', __('admin_pages.add.form.meta.title'), array($old['meta_title'], array('style' => 'width: 770px')), array('error' => $errors[$language->language_key]->first('meta_title'))) ?>
					<?= Form::field('textarea', $language->language_key.'[meta_description]', __('admin_pages.add.form.meta.description'), array($old['meta_description'], array('style' => 'height: 60px; width: 770px')), array('error' => $errors[$language->language_key]->first('meta_description'))) ?>
					<?= Form::field('textarea', $language->language_key.'[meta_keywords]', __('admin_pages.add.form.meta.keywords'), array($old['meta_keywords'], array('style' => 'height: 60px; width: 770px')), array('error' => $errors[$language->language_key]->first('meta_keywords'))) ?>
				</fieldset>
				<fieldset>
					<div class="row">
						<legend class="offset2"><?= __('admin_pages.add.form.page_legend') ?></legend>
					</div>
					<?= Form::field('text', $language->language_key.'[menu]', __('admin_pages.add.form.page.menu'), array($old['menu'], array('style' => 'width: 770px')), array('error' => $errors[$language->language_key]->first('menu'))) ?>
					<?= Form::field('text', $language->language_key.'[url]', __('admin_pages.add.form.page.url'), array($old['url'], array('style' => 'width: 770px', 'class' => 'url')), array('error' => $errors[$language->language_key]->first('url'))) ?>
					<?= Form::field('text', $language->language_key.'[title]', __('admin_pages.add.form.page.title'), array($old['title'], array('style' => 'width: 770px')), array('error' => $errors[$language->language_key]->first('title'))) ?>
					<?= Form::field('textarea', $language->language_key.'[content]', __('admin_pages.add.form.page.content'), array($old['content'], array('style' => 'height: 350px; width: 770px')), array('error' => $errors[$language->language_key]->first('content'))) ?>
				</fieldset>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<?= Form::actions(array(Form::submit(__('admin_pages.add.form.submit'), array('class' => 'btn btn-large btn-primary')))) ?>
	<?= Form::close() ?>
</div>
<a onclick="validateForm()" class="btn">click</a>
<script type="text/javascript">
	var validator;

	$(document).ready(function() {
		validator = new Validator({
			'unique:page_lang,url|required': {
				fields: ['nl[url]', 'en[url]'],
				name: 'URL',
				live: true,
				errorHandler: function(errors) {
					for(var name in errors) {
						var elem = $('[name=\''+name+'\']');
						elem.parent().parent().addClass('error');
						elem.parent().append('<span class="help-inline">' + errors[name][0] + '</span>');
					}
					console.info('Live validation errors!');
					console.log(errors);
				},
				successHandler: function() {
					console.info('Live validation success!');
				}
			},
			'in:1,2,3': {
				fields: 'layout_id',
				name: 'Layout'
			}
		});
	});

	function validateForm() {
		validator.validate(
			function(errors) {
				console.info('Form validation errors!');
				console.log(errors);
			},
			function() {
				console.info('Form validation success!');
			}
		);
	}
</script>