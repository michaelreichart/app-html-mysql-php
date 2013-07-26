<?php
require_once ROOT . 'app/interfaces/dbInterface.php';

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
  
class Db_Mysql extends Db implements dbInterface
{
	protected $connection = NULL;
	protected $result     = NULL;


	public function __construct() {
        
        // Entwicklungszugang!
        if($_SERVER['SERVER_NAME'] == 'localhost'){
            $host     = 'localhost';
            $database = 'application';
            $user     = 'root';
            $password = '';
        }
        
		try {
            $this->connect($host, $database, $user, $password);
            return TRUE;
        } catch (Exception $e) {
            $e->getMessage;
            return FALSE;
        }
	}

	public function connect ($host, $database, $user, $password)
	{
		$this->connection = mysql_connect(
			$host,
			$user,
			$password,
			TRUE
		);

		if (!$this->connection) {
			throw new DB_Exception(
				'Datenbankverbindung nicht verfügbar.',
				 @mysql_errno()
			);
			return FALSE;
		}

		if (!mysql_select_db($database, $this->connection)) {
			throw new DB_Exception(
				'Datenbank nicht verfügbar.',
				 @mysql_errno($this->connection)
			);
			return FALSE;
		}

		return TRUE;
	}

	public function disconnect ()
	{
		if (is_resource($this->connection))
			@mysql_close($this->connection);	 	
	}

	// Query im Objektkontext
	public function query ($query)
	{	
        if (is_resource($this->connection)) {
			if (is_resource($this->result)) {
		 		@mysql_free_result($this->result);
			}
		}

		$this->result = mysql_query($query);
		
		if (!$this->result) {
			return FALSE;
		}
        
        return TRUE;
	}

	public function fetchRow ()
	{
		if (is_resource($this->result)) {
			
			$row = @mysql_fetch_assoc($this->result);

			if (is_array($row)) {
				return $row;
			/*
             * } else {
				throw new DB_Exception(
					'Keine Datensätze!' . @mysql_error($this->connection),
					@mysql_errno($this->connection)
				);
				return FALSE;
                */
			}
		}
	}
	
	private function report ($message)
	{
		echo '<tt>' . $message . '</tt><br><br>';
	}
}
?>