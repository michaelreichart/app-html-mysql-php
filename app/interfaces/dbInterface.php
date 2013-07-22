<?php
/**
 *  Interface for the Db class
 *  
 *  Describes all constants and public functions 
 *  to be used in the View class.
 *
 *  @category   Augmented Me
 *  @package    model
 *  @author     Michael Reichart [michael@michaelreichart.de] 
 *  @copyright  1999-2013 Michael Reichart
 *  @license    http://www.michaelreichart.de/license/1.txt
 *  @version    SVN: $Id$
 *  @see        http://michaelreichart.de/
 *  @since      Class available since Release 1.0.0
 */

interface dbInterface 
{
/**
 *  NO CONSTANTS
 */

/**
 *  CONSTRUCTOR FOR DB
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return string;
 */
	public function __construct();

/**
 *  CONNECT TO DATABASE
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return boolean;
 */
	public function connect ($host, $database, $user, $password);

/**
 *  DISCONNECT FROM DATABASE
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return boolean;
 */
	public function disconnect ();

/**
 *  SEND A QUERY
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return boolean;
 */
	public function query ($query);

/**
 *  GIVES A SINGLE DATA ROW AS ARRAY
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return array;
 */

	public function fetchRow ();
	
}
?>