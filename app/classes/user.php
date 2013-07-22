<?php
require_once ROOT . '_src/interfaces/userInterface.php';

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category   Augmented Me
 * @package    Model
 * @subpackage User
 * @author     Michael Reichart 
 * @copyright  1999-2012 Michael Reichart
 * @license    http://www.michaelreichart.de/license/1.txt
 * @version    SVN: $Id$
 * @since      Class available since Release 1.0.0
 */
class User extends Db_Mysql implements userInterface
{
    // Properties
    private $id;
    private $username;
    private $email;
    private $password;
    private $userData;
    private $image;
    
    // Magic Methods
    private function __call($name, $arguments)
    {
        echo '<tt style="color:red;"><br>Die Funktion ' . $name . ' ist noch nicht implementiert!</tt>';
    }

    // Other Methods
    
    public function findUser($id)
    {
        $query = "
            SELECT
                *
            FROM
                user
            WHERE
                user_id=" . $id . "
            ;";
        
        $this->query($query);
        $row = $this->fetchRow();
        
        $this->setId($row['user_id']);
        $this->setUsername($row['username']);
        $this->setEmail($row['email']);
        $this->setPassword($row['password']);
        $this->setUserData($row['user_data']);
        $this->setImage($row['image']);
        
        return true;
    }
    
    /**
     *
     * @param  array $array
     * @return boolean 
     */
    public function exists($array = array())
    {
        if (isset($array['email'])){
            $this->setEmail($array['email']); 
        }
        if (isset($array['password'])){
             $this->setPassword($array['password']);
        }
        echo "lala";
        return $this->findId();
    }
    
    /**
     * @return boolean 
     */
    private function findId()
    {
        $query = "
            SELECT
                user_id
            FROM
                user
            WHERE
                email='" . $this->getEmail() . "'
            AND
                password='" . md5($this->getPassword()) . "'
            ;";
        
        
        try {
            
            $this->query($query);
        
            
        } catch (Db_Exception $dbe) {
            
            
            // Fehlermeldung fangen und ausgeben
            // Debug liefert eine ausführliche Meldung
            // für den Liveserver genügt eine kurze Meldung
            // OHNE konkrete Informationen!! (Geheimnisverrat!)
            if (DEBUG) {
                $dbe->showDebug();
            } else {
                $dbe->show();
            }
            
        }
		
        
        if ($row = $this->fetchRow()) {
            
            $this->setId($row['user_id']);
            return true;
            
        } else {
            
            return false;
            
        }

     }
     
     public function getMessageCount ()
     {
         // Datenbankabfrage
         $query = "
             SELECT
                count(message_id) AS count
             FROM
                messages
             WHERE
                sender_id = " . $this->getId() . "
             ;
         ";
         
         $this->query($query);
         $row = $this->fetchRow();
         return $row['count'];
         
     }


    public function getAllMessageIds ()
     {
         // Datenbankabfrage
         $query = "
             SELECT
                message_id
             FROM
                messages
             WHERE
                sender_id = " . $this->getId() . "
             ;
         ";
         
         $this->query($query);
        
         while($row = mysql_fetch_assoc($this->result)) {
            $array[] = $row['message_id'];
         }
         return $array;
         
     }


    // Getter und Setter
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    // USERNAME
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    // EMAIL
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    // PASSWORD
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    // USER DATA
    public function getUserData(){
        return $this->userData;
    }
    public function setUserData($userData){
        $this->userData = $userData;
    }
    // IMAGE
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

}






















/*     private function readDataFromDb()
     {		
         if ($this->getId() > 0) {
			$query = "
				SELECT
					data, image
				FROM
					user
				WHERE
					user_id=" . $this->getId() . "
				;";
		
			$this->query($query);
		
			$row = $this->fetchRow();

			$this->setUserData = $row['data'];
			$this->setImage    = $row['image'];
		}
     }
 */
?>
