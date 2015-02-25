<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "Debe aceptar el :attribute.",
	"active_url"           => "El campo :attribute no es una URL válida.",
	"after"                => "El campo :attribute debe ser una fecha despues de :date.",
	"alpha"                => "El campo :attribute solo puede contener letras.",
	"alpha_dash"           => "El campo :attribute solo puede contener letras, numeros y guiones.",
	"alpha_num"            => "El campo :attribute solo puede contener letras y numeros.",
	"array"                => "El campo :attribute debe ser un arreglo.",
	"before"               => "El campo :attribute debe ser una fecha antes :date.",
	"between"              => array(
		"numeric" => "El campo :attribute debe ser entre :min y :max.",
		"file"    => "El campo :attribute debe ser entre :min y :max kilobytes.",
		"string"  => "El campo :attribute debe ser entre :min y :max caracteres.",
		"array"   => "El campo :attribute debe tener entre :min y :max items.",
	),
	"boolean"              => "El campo :attribute debe ser true o false.",
	"confirmed"            => "La confirmación del campo :attribute no coincide.",
	"date"                 => "El campo :attribute no es una fecha válida.",
	"date_format"          => "El campo :attribute no coincide con el formato :format.",
	"different"            => "El campo :attribute y :other deben ser diferentes.",
	"digits"               => "El campo :attribute debe ser :digits digitos.",
	"digits_between"       => "El campo :attribute debe ser entre :min y :max digitos.",
	"email"                => "El campo :attribute debe ser un email válido.",
	"exists"               => "El :attribute seleccionado no es válido.",
	"image"                => "El campo :attribute debe ser una imagen.",
	"in"                   => "El :attribute seleccionado no es válido.",
	"integer"              => "El campo :attribute debe ser un número entero.",
	"ip"                   => "El campo :attribute debe ser una dirección IP válida.",
	"max"                  => array(
		"numeric" => "El campo :attribute no puede ser mayor que :max.",
		"file"    => "El campo :attribute no puede ser mayor que :max kilobytes.",
		"string"  => "El campo :attribute no puede tener mas de :max caracteres.",
		"array"   => "El campo :attribute no puede tener mas de :max items.",
	),
	"mimes"                => "El campo :attribute debe ser un archivo de tipo: :values.",
	"min"                  => array(
		"numeric" => "El campo :attribute debe tener mínimo :min.",
		"file"    => "El campo :attribute debe tener mínimo :min kilobytes.",
		"string"  => "El campo :attribute debe tener mínimo :min caracteres.",
		"array"   => "El campo :attribute debe tener mínimo :min items.",
	),
	"not_in"               => "El :attribute seleccionado no es válido.",
	"numeric"              => "El campo :attribute debe ser un número.",
	"regex"                => "El formato del campo :attribute no es válido.",
	"required"             => "El campo :attribute es requerido.",
	"required_if"          => "El campo :attribute es requerido cuando :other es :value.",
	"required_with"        => "El campo :attribute es requerido cuando :values esta presente.",
	"required_with_all"    => "El campo :attribute es requerido cuando :values esta presente.",
	"required_without"     => "El campo :attribute es requerido cuando :values no esta presente.",
	"required_without_all" => "El campo :attribute es requerido cuando ninguno de :values esta presente.",
	"same"                 => "El campo :attribute y :other deben coincidir.",
	"size"                 => array(
		"numeric" => "El campo :attribute debe tener :size.",
		"file"    => "El campo :attribute debe tener :size kilobytes.",
		"string"  => "El campo :attribute debe tener :size caracteres.",
		"array"   => "El campo :attribute debe contener :size items.",
	),
	"unique"               => "El campo :attribute ya existe.",
	"url"                  => "El formato del campo :attribute no es válido.",
	"timezone"             => "El campo :attribute debe ser una zona válida.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),


	/*
	|--------------------------------------------------------------------------
	| Custom Validation Rules
	|--------------------------------------------------------------------------
	|
	| Custom rules created in app/validators.php
	|
	*/
	"alpha_spaces"     => "El campo :attribute solo puede tener letras y espacios.",

);
