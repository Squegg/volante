<?php

return array(

	"accepted"       => "The :attribute must be accepted.",
	"active_url"     => "The :attribute is not a valid URL.",
	"alpha"          => "The :attribute may only contain letters.",
	"alpha_dash"     => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"      => "The :attribute may only contain letters and numbers.",
	"between"        => array(
		"numeric" => "De :attribute moet liggen tussen :min - :max.",
		"file"    => "De :attribute moet tussen de :min - :max kilobytes groot zijn.",
		"string"  => "De :attribute moet tussen :min en :max karakters lang zijn.",
	),
	"confirmed"      => "De :attribute bevestiging komt niet overeen.",
	"different"      => "De :attribute en :other moeten verschillend zijn.",
	"email"          => "Het :attribute formaat is incorrect.",
	"exists"         => "De geselecteerde :attribute is incorrect.",
	"image"          => "De :attribute moet een afbeelding zijn.",
	"in"             => "Het geselecteerde :attribute is incorrect.",
	"integer"        => "Het :attribute moet een nummer zijn.",
	"ip"             => "Het :attribute moet een valide IP address zijn.",
	"max"            => array(
		"numeric" => "The :attribute must be less than :max.",
		"file"    => "The :attribute must be less than :max kilobytes.",
		"string"  => "The :attribute must be less than :max characters.",
	),
	"mimes"          => "The :attribute must be a file of type: :values.",
	"min"            => array(
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
	),
	"not_in"         => "The selected :attribute is invalid.",
	"numeric"        => "The :attribute must be a number.",
	"required"       => "Het :attribute veld is verplicht.",
	"same"           => "The :attribute and :other must match.",
	"size"           => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobyte.",
		"string"  => "The :attribute must be :size characters.",
	),
	"unique"         => "Het :attribute is al in gebruik.",
	"url"            => "De :attribute is incorrect.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute_rule" to name the lines. This helps keep your
	| custom validation clean and tidy.
	|
	| So, say you want to use a custom validation message when validating that
	| the "email" attribute is unique. Just add "email_unique" to this array
	| with your custom message. The Validator will handle the rest!
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". Your users will thank you.
	|
	| The Validator class will automatically search this array of lines it
	| is attempting to replace the :attribute place-holder in messages.
	| It's pretty slick. We think you'll like it.
	|
	*/

	'attributes' => array(),

);