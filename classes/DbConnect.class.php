<?php
/**
 * CreateUser class - Creates a new user and adds to the database
 *
 * @var string $host
 * @var string $user
 * @var string $pass
 * @var string $name
 * @var string $conn
 **/
class DbConnect {
	private $host = 'localhost';
	private $user = 'basic_user';
	private $pass = 'basic_user';
	private $name = 'addressbook';
	private $conn;
	
	private static $instance;
	
	private function __construct() {
		//Connect 
		mysql_connect($this->host, $this->user, $this->pass) or die (mysql_error());
		//Select DB
		mysql_select_db($this->name) or die('could not select' . mysql_error());
		
	}
	
	public static function get() {
		
		if(!isset(self::$instance)) {
			self::$instance = new DbConnect;
		}
		
		return self::$instance;
	}
	
	public function query($string, $arguments) {
		
		foreach($arguments as &$argument) {
			$argument = mysql_real_escape_string($argument);
			//echo($argument);
		}
		
		$statement = vsprintf($string, $arguments);
		//echo($statement);
		$result = mysql_query($statement) or die(mysql_error());
		
		return $result;
	}
	
}

?>