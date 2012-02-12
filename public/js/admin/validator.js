function ValidatorField(name, rule, options) {
	this.name = name;
	this.rule = rule;
	this.options = options;
	this.addListener();
	this.lastValue = this.getValue();
}

ValidatorField.prototype = new Validator();

ValidatorField.prototype.addListener = function() {
	if( ! this.options.live) return;

	if( ! this.options.hasOwnProperty('errorHandler') ||  ! this.options.hasOwnProperty('successHandler')) {
		alert('To use live mode, please add an errorHandler and successHandler to the rule options');
	}

	var that = this;
	this.getField().unbind().bind('keyup change', function() {
		if($(this).val() != that.lastValue && $(this).val() != '') {
			that.lastValue = $(this).val();
			that.check([that], that.options.errorHandler, that.options.successHandler);
		}
	});
};

ValidatorField.prototype.getField = function() {
	return $('[name=\'' + this.name + '\']');
};

ValidatorField.prototype.getName = function() {
	return this.name;
};

ValidatorField.prototype.validate = function(errorHandler, successHandler) {
	this.check([this], errorHandler, successHandler);
};

ValidatorField.prototype.setRule = function(rule) {
	this.rule = rule;
	return this;
};

ValidatorField.prototype.setOptions = function(options) {
	this.options = options;
	this.addListener();
	return this;
};

ValidatorField.prototype.getRule = function() {
	return this.rule;
};

ValidatorField.prototype.getValue = function() {
	return this.getField().val();
};


function Validator(rulesFields, cb) {
	this.fields = [];
	this.options = {
		interval: 800,
	};
	this.request = {};

	for(var rule in rulesFields) {
		var fields = (typeof rulesFields[rule].fields == 'string' ? [rulesFields[rule].fields] : rulesFields[rule].fields);
		for(var i in fields) {
			this.fields[fields[i]] = new ValidatorField(fields[i], rule, rulesFields[rule]);
		}
	}
}

Validator.prototype.getField = function(name) {
	return this.fields[name];
};

Validator.prototype.getFields = function() {
	return this.fields;
};

Validator.prototype.validate = function(errorHandler, successHandler) {
	this.check(this.fields, errorHandler, successHandler);
};

Validator.prototype.check = function(fields, errorHandler, successHandler) {
	var input = {};
	var rules = {};

	for(var name in fields) {
		var field = fields[name];
		input = $.extend(true, input, this.stringToObject(this.toKey(field.getName()), field.getValue()));
		rules[this.toKey(field.getName())] = field.getRule();
	}

	var that = this;
	if(this.request.hasOwnProperty('abort')) this.request.abort();
	function doValidation() {
		that.request = $.post(BASE_URL + '/admin/ajax/validate', {input: input, rules: rules}, validationDone, 'JSON');
	}

	function validationDone(e) {
		if(e.status == e.statusTypes.SUCCESS) {
			successHandler();
		}
		else if(e.status == e.statusTypes.VALIDATION_ERRORS) {
			var errors = {};
			for(var key in e.result.messages) {
				for(var i in fields) {
					if(that.toKey(fields[i].name) == key) {
						var fieldOptionsName = fields[i].options.name;
						var fieldName = fields[i].name;
					}
				}
				errors[fieldName] = [];
				for(var j in e.result.messages[key]) {
					errors[fieldName][j] = e.result.messages[key][j].replace(key.replace('_', ' '), fieldOptionsName);
				}
			}
			errorHandler(errors);
		}
		else {
			alert(e.description + ' (' + e.status + ')');
		}
	}

	clearTimeout(this.timeout);
	this.timeout = setTimeout(doValidation, 800);
};

Validator.prototype.stringToObject = function(path, value) {
	var object = {};
	segments = path.split('.');

	if(segments.length > 1) {
		object[segments[0]] = this.stringToObject(segments.slice(1).join('.'), value);
	}
	else {
		object[segments[0]] = value;
	}
	return object;
};

Validator.prototype.toKey = function(name) {
	return name.replace('][', '.').replace('[', '.').replace(']', '');
};