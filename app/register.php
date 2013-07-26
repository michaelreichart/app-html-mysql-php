<?php
	/* REGISTER */
	define('ROOT', '../');

	// Common Include für die Klassen- 
	// und Konfigurationseinbindung
	require_once ROOT . 'app/includes/configuration.php';
	require_once ROOT . 'app/includes/functions.php';
	require_once ROOT . 'app/includes/classes.php';

//	Pflichtinstanzen erzeugen
	$db      = new Db_Mysql;	// Datenbankobjekt
	$user    = new User;		// User muss sein!
	$session = new Session;		// Session hängt am User ...

	$data = array();

	foreach ($_POST as $key=>$value) {
		$data[$key] = validateUserInput($value);
	}

	if($user->exists($data)) {} else {
		$user->storeUser($data);
	}
	
	if($user->exists($data)){
		$user->findUser($user->getUserId());
	}

	
	//  4. Template für die Seite auswählen
	$snippet = ROOT . 'app/templates/userprofile.html';
    
    $view = new View;
    $view->setSnippet($snippet);
    $view->setContent($user);

    //  5. Zwischenspeichern des contents
	echo $view->displaySnippet();
?>