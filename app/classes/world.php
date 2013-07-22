<?php
/**
 * Baut eine ganze Welt
 *
 * @category   Augmented Me
 * @package    model
 * @author     Michael Reichart 
 * @copyright  1999-2012 Michael Reichart
 * @license    http://www.michaelreichart.de/license/1.txt
 * @version    SVN: $Id$
 * @since      Class available since Release 1.0.0
 */
class World
{
    // Properties
    public $thing = null;
    
    // Constructor
    public function __construct(Thing $thing)
    {
        $this->createThing($thing);
    }
    
    public function __destruct()
    {
        echo 'A ' . __CLASS__ . ' has bee destroyed!';
    }
    
    // Methods
    public function createThing(Thing $thing)
    {
        $this->thing = $thing;
        $this->setzeThingSize(0.1);
    }
    
    private function setzeThingSize($value)
    {
        $this->thing->setSize($value);
    }
    
}

?>
