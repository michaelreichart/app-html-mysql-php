<?php
require_once('_src/interfaces/thingInterface.php');
/**
 * Setzt Dinge in die Welt
 *
 * @category   Augmented Me
 * @package    model
 * @author     Michael Reichart [michael@michaelreichart.de] 
 * @copyright  1999-2012 Michael Reichart
 * @license    http://www.michaelreichart.de/license/1.txt
 * @version    SVN: $Id$
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      Class available since Release 1.0.0
 */
class Thing implements thingInterface
{

    // Properties
    private $name   = 'me'; // Meter?
    private $size   = 185;  // Meter?
    private $worth  = 100;  // Meter?
    private $costs  = 100;  // Prozent
    
 //   const MIN_SIZE  = 0;
 //   const MAX_SIZE  = 225;

    public function setName($value)
    {
        $this->name = $value;
    }
    
    public function setSize($value)
    {
        // Setzen des übernommenen Wertes
        $this->size = $value;
        //$this->adjustSize();
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getSize()
    {
        return $this->size;
    }

    public function getWorth()
    {
        return $this->worth;
    }

    public function getCosts()
    {
        return $this->costs;
    }

    private function adjustCosts()
    {
        // Grenzwerte prüfen
        if ($this->getSize() < self::MIN_SIZE) {
            $this->setSize(self::MIN_SIZE);
        } else if ($this->getSize() > self::MAX_SIZE) {
            $this->setSize(self::MAX_SIZE);
        }
    }


}

?>
