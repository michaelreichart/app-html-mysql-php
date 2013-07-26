<?php
	define('ROOT', '../');

	// Common Include für die Klassen- 
	// und Konfiurationseinbindung
	require_once ROOT . 'app/includes/configuration.php';
	require_once ROOT . 'app/includes/classes.php';

//	Pflichtinstanzen erzeugen
	$db      = new Db_Mysql;	// Datenbankobjekt
	$user    = new User;		// User muss sein!
	$session = new Session;		// Session hängt am User ...

	// Test für User finden
	echo $user->findUser('michael@zenbox.de');
	echo $user->getPrename() . ' ' . $user->getSurname();

?>