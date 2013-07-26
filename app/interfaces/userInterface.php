<?php
interface userInterface
{
    public function findUser ($userId);

    public function storeUser ($data);
    
    public function updateUser($userId);
    
    public function deleteUser($userId);

    public function exists ($array = array());

    public function getMessageCount ();

    public function getAllMessageIds ();

    public function getUserId ();
    public function setUserId ($userId);

    public function getSurname ();
    public function setSurname ($surname);
    
    public function getPrename ();
    public function setPrename ($prename); 

    public function getBirthday ();
    public function setBirthday ($birthday);
    
    public function getEmail ();
    public function setEmail ($email);
    
    public function getPassword ();
    public function setPassword ($password);

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
