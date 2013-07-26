<?php
require_once ROOT . 'app/interfaces/sessionInterface.php';

/**
 * Session
 *
 * @category   Augmented Me
 * @package    myBook
 * @author     Michael Reichart <reichart@michaelreichart.de>
 * @copyright  2012 Michael Reichart GmbH
 * @license    http://michaelreichart.de/license/3_01.txt  PHP License 3.01
 * @version    Release: @model_1@
 * @link       http://pear.php.net/package/myBook
 * @since      Class available since Release 1.0.0
 */

class Session extends Db_Mysql implements sessionInterface
{
	//	Eigenschaften

	//	Session id
		protected $sessionId;

	//	Sessionstartzeitpunkt
		protected $time;
        
    // User Id
        protected $userId;
	
	//	Konstanten
	//	keine

	//	Methoden
	//	Konstruktor
		public function __construct ($userId = NULL) {
            
            if ($userId == NULL) {
                $this->findUserId();
            }

            $this->setUserId($userId);
            $this->setSessionId();
            
            return TRUE;
		}

		//	GETTER UND SETTER
		// SESSION ID
		public function getSessionId () {
			return $this->sessionId;
		}
		
		public function setSessionId ()
		{
            @session_start();
			
			$this->sessionId = session_id();
			$this->setTime();
			
			if ( !$this->isSessionId() ) {
                $query = "
                    INSERT INTO 
                       sessions    
                        (session_id, start_time, user_id) 
                    VALUES 
                        ('".$this->getSessionId()."','".$this->getTime()."',".$this->getUserId().");";
			} else {
                $query = "
                    UPDATE 
                        sessions 
                    SET 
                        start_time='".$this->getTime()."' 
                    WHERE 
                        session_id='".$this->getSessionId()."';";
			}
			$this->query($query);

            return TRUE;
			
		}
		
		// STARTTIME
        // START TIME
		public function getTime () {
			return $this->startTime;
		}
	

		public function setTime ()
		{
			return $this->startTime = date('Y-m-d h:i:s');
		}
		
        // USER ID
        public function getUserId () {
            return $this->userId;
        }
        
        
        public function setUserId ($val) {
            $this->userId = $val;
        }
        
        //	MORE ...
		public function isSessionId ()
		{
			$query = "
                SELECT 
                    count(session_id) 
                AS 
                    count 
                FROM 
                    sessions 
                WHERE 
                    session_id='".$this->getSessionId()."';";
            
			$this->query($query);
			
			if ($this->result) {
                
                $row = $this->fetchRow();
                
                if ($row['count'] == 1)
                    return TRUE;
                else
                    return FALSE;
                
            } else {
				return FALSE;
            }
		}
		
    public function findUserId()
    {
        $query = "
            SELECT
                user_id
            FROM
                sessions
            WHERE
                session_id='" . $this->getSessionId() . "'
            ;";
        
        $this->query($query);
        $row = $this->fetchRow();
        
        $this->setUserId($row['user_id']);
        
        return TRUE;
    } 
   
}
?>