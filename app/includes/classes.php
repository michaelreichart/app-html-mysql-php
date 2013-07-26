<?php
/** CLASSES */

// Autoloader für Klassen
$GLOBALS['classes'] = array(

	'Db_Exception'	=> ROOT . 'app/classes/db_exception.php',
	'Db'			=> ROOT . 'app/classes/db.php',
	'Db_Mysql'		=> ROOT . 'app/classes/db_mysql.php',
	'User'			=> ROOT . 'app/classes/user_final.php',
	'Session'		=> ROOT . 'app/classes/session.php',
	'Message'		=> ROOT . 'app/classes/message.php',
	'View'			=> ROOT . 'app/classes/view.php',
);


function __autoload ($className) {

	$class = $GLOBALS['classes'][$className];

	if ( isset($class) && file_exists($class) ) {
		require_once $class;
	}
}
?>