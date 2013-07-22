<?php
/**
 *  Interface for the thing class
 *  
 *  Describes all constants and public functions 
 *  to be used in the thing class.
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

interface thingInterface
{
/**
 *  CONSTANTS
 *  not to be defined again in the class!
 */
    const MIN_SIZE = 0;
    const MAX_SIZE = 200;

    public function setName($string);

/**
 *  SETTER FOR SIZE
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @param      float
 */
    public function setSize($float);
/**
 *  GETTER FOR NAME
 *
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *
 *  @return     string 
 */
    public function getName();
/**
 *  GETTER FOR SIZE
 *
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *
 *  @return     float 
 */
    public function getSize();
/**
 *  GETTER FOR WORTH
 *
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *
 *  @return     float 
 */
    public function getWorth();
/**
 *  GETTER FOR COSTS
 *
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *
 *  @return     float
 */
    public function getCosts();
 

}

?>