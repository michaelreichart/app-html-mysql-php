<?php
interface userInterface
{
    public function findUser ($id);
    public function exists ($array = array());
    public function getMessageCount ();
    public function getAllMessageIds ();
    public function getId ();
    public function setId ($id);
    public function getUsername ();
    public function setUsername ($username);
    public function getEmail ();
    public function setEmail ($email);
    public function getPassword ();
    public function setPassword ($password);
    public function getUserData ();
    public function setUserData ($userData);
    public function getImage ();
    public function setImage ($image);

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
