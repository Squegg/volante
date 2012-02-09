$.fn.languageSelector = function() {
	var that = this;
	var activeList = this.find('li').not('.dropdown').not('.active');
	var addList = this.find('.dropdown-menu li');

	function addLanguage(id) {
		$('#tab_' + id).removeClass('hide');
		$('#tab_' + id).find('a').tab('show');
		addList.find('a[href=#' + id + ']').parent().addClass('hide');
		if(addList.not('.hide').size() == 0) {
			that.find('li.dropdown').addClass('hide');
		}
	}

	function removeLanguage(id) {
		$('#tab_' + id).addClass('hide');
		addList.find('a[href=#' + id + ']').parent().removeClass('hide');
		if(addList.not('.hide').size() > 0) {
			that.find('.dropdown').removeClass('hide');
		}
		$('#default a').tab('show');
	}

	addList.find('a').click(function() {
		addLanguage($(this).data('id'));
	});

	activeList.find('i').click(function() {
		removeLanguage($(this).parent().data('id'));
	});
};

$(document).ready(function() {
	$('.language-selector').languageSelector();
});