$.fn.validate = function(rules, cb) {
	var field = this,
		timeout,
		request = {},
		interval = 1000,
		input;

	if(typeof rules == 'object') {
		var rules = rules.join('|');
	}

	var handleResult = function(e) {
		if(e.status == e.statusTypes.SUCCESS) {
			field.parent().addClass('success');
		}
		else if(e.status == e.statusTypes.VALIDATION_ERRORS) {
			for(var i in e.result.messages) {
				for(var j in e.result.messages[i]) {
					var messages[] = e.result.messages[i][j].replace(/\S+\.(?=\S)/, '');
				}
			}
			field.parent().addClass('error');
		}
		else {
			alert(e.description + ' (' + e.status + ')');
		}
	};

	function getPathToDeepestKey(object, parts) {
		for(var i in object) {
			if(typeof object[i] == 'object') {
				return getPathToDeepestKey(object[i], i);
			}
			else {
				return (parts ? parts + '.' + i : i);
			}
		}
	}

	var validate = function(e) {
		input = field.closest('form').toObject({mode: 'combine'});

		if(request.hasOwnProperty('abort')) request.abort();
		clearTimeout(timeout);

		var parsedRules = {};

		if(field.length > 0) {
			field.each(function(i, elem) {
				var depth = $(elem).toObject({mode: 'combine', skipEmpty: false});
				for(var j in rules) {
					parsedRules[getPathToDeepestKey(depth)] = rules;
				}
			});
		}
		else {
			var depth = item.toObject({mode: 'combine', skipEmpty: false});
			for(var j in rules) {
				parsedRules[getPathToDeepestKey(depth)] = rules;
			}
		}

		timeout = setTimeout(function() {
			request = $.post(BASE_URL + '/admin/ajax/validate', {input: input, rules: parsedRules}, handleResult, 'JSON');
		}, interval);
	}

	field.bind('change keyup', validate);
};