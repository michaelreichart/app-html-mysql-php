<?php
/**
 *  Interface for the View class
 *  
 *  Describes all constants and public functions 
 *  to be used in the View class.
 *
 *  @category   Augmented Me
 *  @package    view
 *  @author     Michael Reichart [michael@michaelreichart.de] 
 *  @copyright  1999-2013 Michael Reichart
 *  @license    http://www.michaelreichart.de/license/1.txt
 *  @version    SVN: $Id$
 *  @see        http://michaelreichart.de/
 *  @since      Class available since Release 1.0.0
 */

interface viewInterface
{
/**
 *  NO CONSTANTS
 */

/**
 *  CONSTRUCTOR FOR VIEW
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return string;
 */
    public function __construct($content = '');
    
/**
 *  GETTER FOR TEMPLATE
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return     string
 */
    public function getTemplate();

/**
 *  SETTER FOR $this->template
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @param      string
 */
    public function setTemplate($template);

/**
 *  SETTER FOR $this->snippet
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @param      string
 */
    public function setSnippet($snippet);

/**
 *  GETTER FOR SNIPPET
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return     string
 */
    public function getSnippet();

/**
 *  GETTER FOR $this->content
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return     string
 */
    public function getContent();
        
/**
 *  SETTER FOR $this->content
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @param      string
 */
    public function setContent($content);
  
/**
 *  DISPLAY
 *  
 *  @author     Michael Reichart <reichart@michaelreichart.de>
 *  @version    1.0
 *  @since      Method available since Release 1.0.0
 *  
 *  @return     string
 */

    public function display();

}
?>