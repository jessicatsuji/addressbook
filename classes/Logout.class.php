<?php
/* Logout class working. Old methods from Blend still here just incase we need them. */
class Logout {
	private $user_name;
	private $db;
	private $table;
	//private $active = "0";
	//private $closed = "1";
	private $query_string;
	private $arguments;
	private $result;
	
	public function __construct() {
		$this->user_name = $_SESSION['current_user'];
		
		
		//Connect to database
		$this->db = DbConnect::get();
		
		//$this->endConvo();
		//$this->deleteMessages();
		$this->logout();
		$this->endSession();
	}
	
	private function packageConvoArguments() {
		$this->arguments = array($this->table, $this->active, $this->closed, $this->user_name, $this->user_name, $this->user_name);
		return true;
	}
	
	private function packageLogoutArguments() {
		$this->arguments = array($this->table, $this->user_name);
		return true;
	}
	
	private function packageMessagesArguments() {
		$this->arguments = array($this->table, $this->user_name, $this->user_name);
		return true;
	}
	
	private function endConvo() {
		$this->table = 'conversations';
		$this->query_string = "UPDATE %s SET active = %s, closed = %s, closer = '%s' WHERE sender = '%s' OR receiver = '%s'";
		$this->packageConvoArguments();
		$this->result = $this->db->query($this->query_string, $this->arguments);
	
	}
	
	private function deleteMessages() {
		$this->table = 'messages';
		$this->query_string = "DELETE FROM %s WHERE sender = '%s' OR receiver = '%s'";
		$this->packageMessagesArguments();
		$this->result = $this->db->query($this->query_string, $this->arguments);
	
	}
	
	private function logout() {
		$this->table = 'users';
		$this->query_string = "UPDATE %s SET logged_in = '0' WHERE user_name = '%s'";
		$this->packageLogoutArguments();
		$this->result = $this->db->query($this->query_string, $this->arguments);
	}
	
	//End Session and redirect
	private function endSession() {
		session_destroy();
		header("Location: ../index.php");
	}
}

?>