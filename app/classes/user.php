<?php
require_once 'db_mysql.php';

class User extends Db_Mysql {

	// Eigenschaften - Properties
	private $userId   = NULL;
	private $prename  = NULL;
	private $surname  = NULL;
	private $birthday = NULL;
	private $email    = NULL;
	private $password = NULL;

	// Funktionen - Methods
	// Magische Methoden, Interzeptoren
	public function __construct	(
									$prename  = NULL, 
									$surname  = NULL, 
									$birthday = NULL,
									$email    = NULL,
									$password = NULL
								) {
		parent::__construct();


		$this->setPrename($prename);
		$this->setSurname($surname);
		$this->setBirthday($birthday);
		$this->setEmail($email);
		$this->setPassword($password);

		$this->storeUser();
//		echo $this->getUserId();

		return true;
	}

	// PRIVATE METHODS

	// findUser() - Statische Methode der Klasse
	// mit der ein User ermittelt werden kann, 
	// ohne vorher ein Userobjekt zu erzeugen
	public function findUser($email) {
		$sql = "
			SELECT 
				*
			FROM
				user
			WHERE
				email='" . $email . "'
			;
		";

		$this->query($sql);

		$numRows = mysql_num_rows($this->result);
		$numFields = mysql_num_fields($this->result);

		if ($numRows === 1) {
			// Alles prima!
			$row = mysql_fetch_assoc($this->result);


			return TRUE;


		} else {
			// Ist nicht gut ...
			return FALSE;
		}

	}


	private function storeUser() {
		$sql = "
				INSERT INTO 
					user
					(prename, surname, birthday, email, password)
				VALUES
					(	'" . $this->getPrename()  . "', 
						'" . $this->getSurname()  . "', 
						'" . $this->getBirthday() . "', 
						'" . $this->getEmail()    . "', 
						'" . $this->getPassword() . "'
					)
				;
		";
		if ($this->query($sql)) {
			$this->userId = mysql_insert_id();
			echo $this->userId;
		} else {
			echo 'Nicht gut!';
		}
	}

	private function updateUser() {}
	private function deleteUser() {}

	// GETTER und SETTER
	public function getUserId(){
		return $this->userId;
	}
	public function setUserId($userId){
		if ($userId !== '') {
			$this->userId = $userId;
		}
	}
	public function getPrename(){
		return $this->prename;
	}
	public function setPrename($prename){
		if ($prename !== '') {
			$this->prename = $prename;
		}
	}
	public function getSurname(){
		return $this->surname;
	}
	public function setSurname($surname){
		if ($surname !== '') {
			$this->surname = $surname;
		}
	}
	public function getBirthday(){
		return $this->birthday;
	}
	public function setBirthday($birthday){
		if ($birthday !== '') {
			$this->birthday = $birthday;
		}
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		if ($email !== '') {
			$this->email = $email;
		}
	}
	public function getPassword(){
		return $this->password;
	}
    public function setPassword($password){
		if ($password !== '') {
			$this->password = $password;
		}
	}
}

?>