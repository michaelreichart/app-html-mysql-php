<?php
/** CONFIGURATION */

//	Debug Schalter zur Steuerung
//	der Debugausgaben
	define('DEBUG', true);

//	Error Schalter zur Steuerung 
//	der Fehlerausgaben aus PHP
	define('ERROR', true);

//	Fehlerlevel setzen
	if ( !ERROR ) {
		// Überschreiben des php.ini error_reporting Wertes
		error_reporting(0); // Keine Fehlerausgabe
	} else {
		// E_NOTICES, E_WARNINGS, E_ERROR, E_PARSE
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICES);
	}

//	Anderes
	$config['defaultLanguage'] = 'de';


?>