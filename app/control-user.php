<?php
	
	// Einbinden der Klasse
	// require führt zu Programmabruch, 
	// falls in User etwas nicht funktioniert
	require_once 'classes/user.php';

	// Eine Instanz bilden
	// führt zum $user - Objekt
	$user[] = new User('Michael', 'Reichart'); 
	$user[] = new User('Jakob', 'Reinke'); 
	$user[] = new User('Maximilian', 'Sell'); 
	$user[] = new User('Kai', 'Schmidt-Laatz'); 


	// Objekt Variablen verändern und auslesen
	$user[0]->setPrename('Klaus');
	echo $user[0]->getPrename();


	// Testausgabe
	echo '<pre>';
	for ($i=0; $i<sizeof($user);$i++) {
		var_dump($user[$i]);
	}
	echo '</pre>';


?>