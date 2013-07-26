<?php
require_once ROOT . 'app/interfaces/userInterface.php';

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
    private $userId;
    private $surname;
    private $prename;
    private $birthday;
    private $email;
    private $password;

    // Magic Methods
    public function __call($name, $arguments)
    {
        echo '<tt style="color:red;"><br>Die Funktion ' . $name . ' ist noch nicht implementiert!</tt>';
    }

    public function __construct($param = null) {
        if ($param === 'empty') {
            $this->prename  = null;
            $this->surname  = null;
            $this->birthday = null;
            $this->email    = null;
            $this->password = null;
        }
    }

    // Other Methods
    
    public function findUser($userId)
    {
        $query = "
            SELECT
                *
            FROM
                user
            WHERE
                userid=" . $userId . "
            ;";
        
        $this->query($query);
        $row = $this->fetchRow();
        
        $this->setUserId($row['userid']);
        $this->setPrename($row['prename']);
        $this->setSurname($row['surname']);
        $this->setBirthday($row['birthday']);
        $this->setEmail($row['email']);
        $this->setPassword($row['password']);
        
        return true;
    }
    
        public function storeUser($data = array()) {
            
            $this->setPrename($data['prename']);
            $this->setSurname($data['surname']);
            $this->setBirthday($data['birthday']);
            $this->setEmail($data['email']);
            $this->setPassword($data['password']);

            $sql = "
                INSERT INTO 
                    user
                    (prename, surname, birthday, email, password)
                VALUES
                    (   '" . $this->getPrename()  . "', 
                        '" . $this->getSurname()  . "', 
                        '" . $this->getBirthday() . "', 
                        '" . $this->getEmail()    . "', 
                        '" . $this->getPassword() . "'
                    )
                ;
        ";
        if ($this->query($sql)) {
            $this->userId = mysql_insert_id();
            return true;
        } else {
            return false;
        }
    }

    /**
     * @todo Funktion muss geschrieben werden ...
     */
    public function updateUser($userId = null) { /* doSomethingAwesome */}

    /**
     * @todo Funktion muss geschrieben werden ...
     */
    public function deleteUser($userId = null) { /* doSomethingAwesome */}

    /**
     *
     * @param  array $array
     * @return boolean
     *
     */
    public function exists($array = array())
    {
        if (isset($array['email'])){
            $this->setEmail($array['email']); 
        }
        if (isset($array['password'])){
             $this->setPassword($array['password']);
        }
        return $this->findId();
    }
    
    /**
     * @return boolean 
     */
    private function findId()
    {
       $query = "
            SELECT
                userid
            FROM
                user
            WHERE
                email='" . $this->getEmail() . "'
            AND
                password='" . $this->getPassword() . "'
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
            
            $this->setUserId($row['userid']);
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
                sender_id = " . $this->getUserId() . "
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
                sender_id = " . $this->getUserId() . "
             ;
         ";
         
         $this->query($query);
        
         while($row = mysql_fetch_assoc($this->result)) {
            $array[] = $row['message_id'];
         }
         return $array;
         
     }


    // Getter und Setter
    public function getUserId(){
        return $this->userId;
    }
    public function setUserId($userId){
        $this->userId = $userId;
    }
    // PRENAME
    public function getPrename(){
        return $this->prename;
    }
    public function setPrename($prename){
        $this->prename = $prename;
    }
    // SURNAME
    public function getSurname(){
        return $this->surname;
    }
    public function setSurname($surname){
        $this->surname = $surname;
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
        $this->password = md5($password);
    }
    // Birthday
    public function getBirthday(){
        return $this->birthday;
    }
    public function setBirthday($birthday){
        $this->birthday = $birthday;
    }
}
?>
