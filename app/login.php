<?php
/** 
 *	Serverapplikation
 */

//	Werteübernahme aus dem CGI Post Array
	$userEmail    = $_POST['email'];
	$userPassword = $_POST['password'];


//	Datenbankverbindung aufbauen
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPassword = '';
	$dbDatabase = 'application';

	$dbConnection = mysql_connect($dbHost, $dbUser, $dbPassword);
	mysql_select_db($dbDatabase);

	// Verbindung steht
	// Datenabfrage nach dem User
	$dbSql = 	"
				SELECT 
					*
				FROM 
					user
				WHERE
					email='" . $userEmail . "'
				AND
					password='" . $userPassword . "'

				;";
	$dbResult = mysql_query($dbSql);

	// Anzahl der gefundenen Datensätze
	$dbNumRows   = mysql_num_rows($dbResult);
	
	// Anzahl der Felder in den Datensätzen
	$dbNumFields = mysql_num_fields($dbResult);

	// Datensätze auslesen
	if ($dbNumRows > 0) {
		while ( $dbRow = mysql_fetch_assoc($dbResult) ) {
			echo '<h2>' . $dbRow['prename'];
			echo 		  $dbRow['surname']		. '</h2>';
			echo '<p>'  . $dbRow['email']		. '</p>';
			echo '<p>'  . $dbRow['password']	. '</p>';
			echo '<p>'  . $dbRow['birthday']	. '</p>';
		}
	} else {
		echo 'Keine Daten gefunden!';
	}
/*
	Literale in einfachen Anführungszeichen
	sind 5 bis 8 mal schneller als solche
	mit doppelten!
	Literale in doppelten Anführungszeichen
	werden auf Variablen geparst!

	$a = 'welt';
	echo "hallo $a"; // hallo welt

*/
?>