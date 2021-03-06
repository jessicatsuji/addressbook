<?php

class Login {
	
	private $user_name;
	private $password;
	private $table;
	private $arguments;
	private $db;
	private static $query_string;
	private $result;
	private $line;
	private static $errorMsg;
	
	public function __construct() {
		
		$this->user_name = $_POST['userName'];
		$this->password = $_POST['password'];
		$this->table = "users";
		
		//Connect to database
		$this->db = DbConnect::get();
		
		//Call validate method
		$this->validate();
		
		//Encrypt login
		$this->encryptLogin();
		
		//Select query
		$this->query_string = "SELECT * FROM %s WHERE user_name = '%s' AND password = '%s'";
		//$this->selectQuery("SELECT * FROM %s WHERE user_name = '%s' AND password = '%s'");
		
		//Package array for query arguments
		$this->packageArguments();
		
		//call query method
		$this->result = $this->db->query($this->query_string, $this->arguments);
		
		//
		$this->handleResults();
		
	}
	
	private function validate() {
		//Check if username and password are sent
		if(isset($this->user_name) && isset($this->password)) {
			//Call encryptLogin method
			return true;
		}
	}
	
	private function encryptLogin() {
		$this->password = crypt($this->password, md5($this->user_name));
		return true;
	}
	
	private function packageArguments() {
		$this->arguments = array($this->table, $this->user_name, $this->password);
		return true;
	}
	
	/*private function selectQuery($queryString) {
		//Use a clean SELECT stament to grab user info
		$this->query_string = $queryString;
		return true;
	}*/
	
	private function handleResults() {
		//split results into array
		$this->line = mysql_fetch_array($this->result, MYSQL_ASSOC);
		
		if ($this->user_name == $this->line['user_name'] && $this->password == $this->line['password']) {
		
			//Set session redirect
			$_SESSION['login'] = true;
			$_SESSION['current_user'] = $this->line['user_name'];
			$_SESSION['current_user_id'] = $this->line['id'];
			
			$this->query_string = "UPDATE %s SET logged_in = 1 WHERE user_name = '%s' AND password = '%s'";
			$this->result = $this->db->query($this->query_string, $this->arguments);
			
			header("Location: ../home.php");
		} else {
			$this->errorMsg .= 'Bad username and password';
			$_SESSION['error'] = $this->errorMsg;
			header("Location: ../index.php");
		}
		
		return true;
	}
	
	
}
?>