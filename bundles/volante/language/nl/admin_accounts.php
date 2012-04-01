<?php
return array(
	'index' => array(
		'title' => 'Accounts',
		'add' => 'Account toevoegen',
		'table' => array(
			'name' => 'naam',
			'email' => 'e-mailadres',
			'roles' => 'rollen'
		),
		'no_results' => 'Er zijn geen accounts gevonden'
	),
	'add' => array(
		'title' => 'Account toevoegen',
		'success' => 'Het account is successvol toegevoegd',
		'form' => array(
			'name' => 'Naam',
			'email' => 'E-mailadres',
			'language' => 'Taal',
			'password' => 'Wachtwoord',
			'roles' => 'Rollen',
			'submit' => 'Account toevoegen'
		)
	),
	'edit' => array(
		'title' => 'Account wijzigen',
		'success' => 'Het account is successvol opgeslagen',
		'form' => array(
			'name' => 'Naam',
			'email' => 'E-mailadres',
			'language' => 'Taal',
			'password' => 'Nieuw wachtwoord',
			'roles' => 'Rollen',
			'submit' => 'Wijzigingen opslaan'
		)
	),
	'delete' => array(
		'title' => 'Weet u het zeker?',
		'message' => 'U staat op het punt om het account van ":0 (:1)" te verwijderen. <b>U kunt dit niet ongedaan maken!</b>',
		'confirm' => 'Account verwijderen',
		'backtoindex' => 'Terug naar het overzicht',
		'success' => 'Het account is successvol verwijdert'
	)
);