<?php
/**
/**
 *  Interface for the session class
 *  
 *  Describes all constants and public functions 
 *  to be used in the thing class.
 *
 *  @category   Augmented Me
 *  @package    model
 *  @subpackage session
 *  @author     Michael Reichart [michael@michaelreichart.de] 
 *  @copyright  1999-2013 Michael Reichart
 *  @license    http://www.michaelreichart.de/license/1.txt
 *  @version    SVN: $Id$
 *  @see        http://michaelreichart.de/
 *  @since      Class available since Release 1.0.0
 */

interface sessionInterface
{
/**
 *  NO CONSTANTS
 */

/**
 *  CONSTRUCTOR FOR SESSION
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return boolean;
 */
	public function __construct ($userId = NULL);

/**
 *  GETTER FOR ID
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return string;
 */
	public function getSessionId ();

/**
 *  SETTER FOR ID
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return string;
 */
	public function setSessionId ();

/**
 *  GETTER FOR TIME
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return string;
 */
	public function getTime ();

/**
 *  SETTER FOR TIME
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return boolean;
 */
	public function setTime ();

/**
 *  GETTER FOR USER ID
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return integer;
 */
    public function getUserId ();

/**
 *  SETTER FOR USER ID
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  @return boolean;
 */
    public function setUserId ($val);

/**
 *  CHECK FOR ID
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return boolean;
 */
	public function isSessionId ();

/**
 *  FIND THE ID OF AN USER
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return true;
 */
    public function findUserId();

}
?>