var editor = ace.edit("editor");
editor.setTheme("ace/theme/twilight");

var javascript = require("ace/mode/javascript").Mode;
var css = require("ace/mode/css").Mode;
var html = require("ace/mode/html").Mode;
editor.setShowPrintMargin(false);
var textarea = $('#content');
textarea.parent().parent().hide();
editor.getSession().setValue(textarea.val());

$('#type').change(function() {
	switch($(this).val()) {
		case 'javascript':
			editor.getSession().setMode(new javascript());
		break;
		case 'stylesheet':
			editor.getSession().setMode(new css());
		break;
		default:
			editor.getSession().setMode(new html());
		break;
	}
});

$('#type').change();

$('form').submit(function() {
	textarea.val(editor.getSession().getValue());
});