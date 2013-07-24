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
		if ($this->query($sql)) echo 'Prima!'; else echo 'Nicht gut!';
	}

	// GETTER und SETTER
   /**
    * @return String
    */
	public function getPrename(){
		return $this->prename;
	}
   /**
    * @var String $prename
    */
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
   /**
    * @return String
    */
	public function getPassword(){
		return $this->password;
	}
   /**
    * @var String $password
    */
    public function setPassword($password){
		if ($password !== '') {
			$this->password = $password;
		}
	}
}

?>