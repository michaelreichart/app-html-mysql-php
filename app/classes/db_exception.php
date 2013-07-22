<?php

/**
 * Fehlerbehandlung für Datenbankzugriffe
 *
 * @category   model
 * @package    myBook
 * @author     Michael Reichart <reichart@michaelreichart.de>
 * @copyright  2012 Michael Reichart GmbH
 * @license    http://michaelreichart.de/license/3_01.txt  PHP License 3.01
 * @version    Release: @model_1@
 * @link       http://pear.php.net/package/myBook
 * @since      Class available since Release 1.0.0
 */

class Db_Exception extends Exception
{
	
	public function showDebug ()
	{
		printf(	'<style>
            /* FEHLERAUSGABE */
.exception {
    margin-left : 125px;
    opacity     : 0.5;
	padding     : 10px;
	font-family : Courier;
	border      : 4px solid maroon;
	color       : maroon;
	background  : lightyellow;
	display     : block;
	min-width   : 250px;
	max-width   : 700px;
	box-shadow  : 7px 7px 7px rgba(0,0,0,0.5);
}
            </style>
            <div class="exception">DATENFEHLER: %s.<br>'
			.	'Fehler in %s in Zeile %s.<br>'
			.	'Code: %s<br>'
			.	'Trace: %s<br>'
			.	'</div>',
			$this->getMessage(),
			$this->getFile(),
			$this->getLine(),
			$this->getCode(),
			$this->getTraceAsString()
		);
	}

	public function show ()
	{
		printf(	'<div class="exception">DATENFEHLER:<br>%s.<br>
			Wenden Sie sich an Ihren Systemadministrator.</div>',
			$this->getMessage()
		);
	}
}
?>