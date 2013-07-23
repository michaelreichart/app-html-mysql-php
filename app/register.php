<?php
/** 
 *	Serverapplikation
 */

//	Werteübernahme aus dem CGI Post Array
	$userSurname    = $_POST['surname'];
	$userPrename    = $_POST['prename'];
	$userBirthday   = $_POST['birthday'];
 	$userEmail    	= $_POST['email'];
	$userPassword 	= $_POST['password'];


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
				INSERT INTO 
					user
					(prename, surname, birthday, email, password)
				VALUES
					(
						'" . $userPrename . "',
						'" . $userSurname . "',
						'" . $userBirthday . "',
						'" . $userEmail . "',
						'" . $userPassword . "'
					)
				;";
	echo $boolean = mysql_query($dbSql);

?>