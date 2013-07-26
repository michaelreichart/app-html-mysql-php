<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * Short description for file
 * Long description for file (if any)...
 * PHP version 5
 * LICENSE: This source file is subject to version 3.01  * of the PHP license
 * that is available through the world-wide-   * web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <author@example.com>
 * @author     Another Author <another@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */

// TODO Lässt sich das generisch lösen?
define ('ROOT', '../');

// Common Includes
require_once ROOT . 'app/includes/configuration.php';	
require_once ROOT . 'app/includes/functions.php';	// Allgemeine Funktionen
require_once ROOT . 'app/includes/classes.php';				

// Pflichtinstanzen
$db      = new Db_Mysql;
$user    = new User;
$session = new Session;

// Eingabe : Datenübernahme
$data = array();

foreach ($_POST as $key=>$value) {
	$data[$key] = validateUserInput($value);
}

// Verarbeitung
// Prüfen, ob der User bereits angelegt ist
// anhand Email und Passwort
// ermittelt die userId und schreibt sie in das Userobjekt
if ($user->exists($data))
	$user->findUser($user->getUserId());


// Ausgabe
// Template (hier nur ein Snippet)
$snippet = ROOT . 'app/templates/userprofile.html';

// View generieren
$view = new View;
$view->setSnippet($snippet);
$view->setContent($user);

// Ausgabe auf den Bildschirm
echo $view->displaySnippet();
?>













