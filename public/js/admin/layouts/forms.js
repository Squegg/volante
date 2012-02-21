var fields = ['content', 'before', 'after'];

var javascript = require("ace/mode/javascript").Mode;
var css = require("ace/mode/css").Mode;
var html = require("ace/mode/html").Mode;

var editors = {};

for(var i in fields) {
	var reference = fields[i];
	editors[reference] = {editor: ace.edit(reference + '_editor')};
	editors[reference].editor.setTheme("ace/theme/twilight");
	editors[reference].editor.setShowPrintMargin(false);
	editors[reference].textarea = $('textarea[name=' + reference + ']');
	editors[reference].textarea.parent().parent().hide();
	editors[reference].editor.getSession().setValue(editors[reference].textarea.val());
}

function setMode(mode) {
	for(var reference in editors) {
		editors[reference].editor.getSession().setMode(mode);
	}	
}

$('#type').change(function() {
	$('#split').hide();
	$('#normal').show();
	switch($(this).val()) {
		case 'js':
			setMode(new javascript());
		break;
		case 'css':
			setMode(new css());
		break;
		case 'decorator':
			$('#normal').hide();
			$('#split').show();
			setMode(new html());
		break;
		default:
			setMode(new html());
		break;
	}
});

$('#type').change();

$('form').submit(function() {
	for(var reference in editors) {
		editors[reference].textarea.val(editors[reference].editor.getSession().getValue());
	}
});