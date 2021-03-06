<?php
	/**
	 * CreateUser class - Creates a new user and adds to the database
	 *
	 * @var array $postArray
	 * @var string $first_name
	 * @var string $user_name
	 * @var string $password
	 * @var string $db
	 * @var string $table
	 * @var string $logged_in
	 * @var string $query_string
	 * @var array $arguments
	 * @var string $result
	 * @var array $line
	 * @var string $errorMsg
	 **/
	class CreateUser {
		private $postArray;
		private $first_name;
		private $user_name;
		private $password;
		private $db;
		private $table;
		private $logged_in;
		private $query_string;
		private $arguments;
		private $result;
		private $line;
		private static $errorMsg = NULL;
		
		public function __construct() {

			//POST array
			$this->postArray = array(
				'Password'=>$_POST['password'],
				'Verified Password'=>$_POST['verifyPass'],
				'First Name'=>$_POST['firstName'],
				'User Name'=>$_POST['userName']
			);
			
			//Checks the posts for spaces, blanks, and matching passwords
			$this->validateInfo();
			
			//Checks the $error variable, if set then set errors and redirect to index else query db
			$this->handleInfo();
		}
		
		private function validateInfo() {
			//If all post variables are set
			if (isset($_POST['firstName']) && isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['verifyPass'])) {
			
				//Check each post variable for blanks or spaces 
				foreach($this->postArray as $postKey=>$postInput) {
					if($postInput == '' || $postInput == ' ') {
						$this->errorMsg .= "$postKey is Required. ";
					}
				}
				
				//Make sure the Password and Verified Password match
				if($this->postArray['Password'] != $this->postArray['Verified Password']) {
					$this->errorMsg .= "Passwords do not match. ";
				}
			
				//return true;
			
			} else {
				$this->errorMsg .= "All fields required. ";
			}
		}
		
		private function handleInfo() {
			//If no errors, query db
			if(!isset($this->errorMsg)) {
				$this->first_name = $this->postArray['First Name'];
				$this->user_name = $this->postArray['User Name'];
				$this->password = $this->postArray['Password'];
				$this->table = "users";
				$this->logged_in = "0";

				//Encrypt login
				$this->encryptLogin();

				//Select query
				$this->query_string = "SELECT * FROM %s WHERE user_name = '%s'";
				
				//Package array for query arguments
				$this->packageArguments();
		
				//Connect to database
				$this->db = DbConnect::get();
						
				//call query method
				$this->result = $this->db->query($this->query_string, $this->arguments);
				
				//Turn result into associative array
				$this->line = mysql_fetch_array($this->result, MYSQL_ASSOC);
				
				//Check to see if user name already exists and redirect, else create new user
				if ($this->line) {
					$this->errorMsg .= 'User Name Already Exists';
					$_SESSION['error'] = $this->errorMsg;
					header("Location: ../index.php");
				} else {
					
					//Select query
					$this->query_string = "INSERT INTO %s (first_name, user_name, password, logged_in) VALUES('%s', '%s', '%s', '%s');";
					
					//Package array for query arguments
					$this->packageInsertArguments();

					//call query method
					$this->result = $this->db->query($this->query_string, $this->arguments);
					
					$this->errorMsg .= 'Account Created, Please Log in';
					$_SESSION['error'] = $this->errorMsg;
					header("Location: ../index.php");
				}
			//If errors, set session and redirect
			} else {
				$_SESSION['error'] = $this->errorMsg;
				header("Location: ../index.php");
			}

		}
	
		private function encryptLogin() {
			$this->password = crypt($this->password, md5($this->user_name));
			return true;
		}
		
		private function packageArguments() {
			$this->arguments = array($this->table, $this->user_name);
			return true;
		}
		
		private function packageInsertArguments() {
			$this->arguments = array($this->table, $this->first_name, $this->user_name, $this->password, $this->logged_in);
			return true;
		}

	}

/*
	//Start Session
	session_start();
	
	//Include DB 
	include("../includes/dbconnect.inc.php");
	
	//Set error variable
	$error = '';
	
	if (isset($_POST['firstName']) && isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['verifyPass'])) {
		
		//Check for matching passwords
		if ($_POST['password'] != $_POST['verifyPass']) {
			$error = "Passwords do not match";
		}
		
		//Check for blank firstName	
		if ($_POST['firstName'] == '' || $_POST['firstName'] == ' ') {
			$error .= 'First Name Required';
		}
	
		//Check for blank userName	
		if ($_POST['userName'] == '' || $_POST['userName'] == ' ') {
			$error .= 'User Name Required';
		}
		
		//Check for blank password
		if ($_POST['password'] == '' || $_POST['password'] == ' ') {
			$error .= 'Password Required';
		}
		
		//Check for blank verified password
		if ($_POST['verifyPass'] == '' || $_POST['verifyPass'] == ' ') {
			$error .= 'Verify Password';
		}
		
		//If error exists set session error and redirect, else query DB
		if ($error) {
			$_SESSION['error'] = $error;
			header("Location: ../index.php");
		} else {
			//Use a clean SELECT stament to grab user info
			$query = sprintf("SELECT * FROM %s WHERE user_name = '%s'",
				mysql_real_escape_string('users'),
				mysql_real_escape_string($_POST['userName'])
			);
			
			//Get query result
			$result = mysql_query($query) or die('could not query' . mysql_error());
			
			//Turn result into associative array
			$line = mysql_fetch_array($result, MYSQL_ASSOC);
			
			//Check to see if user name already exists and redirect, else create new user
			if ($line) {
				$error .= 'User Name Already Exists';
				$_SESSION['error'] = $error;
				header("Location: ../index.php");
			} else {
				$first_name = $_POST['firstName'];
				$user_name = $_POST['userName'];
				$password = $_POST['password'];
				
				mysql_query("INSERT INTO users (first_name, user_name, password, logged_in) VALUES
					('$first_name', '$user_name', '$password', '0');
				") or die(mysql_error());
				$error .= 'Account Created, Please Log in';
				$_SESSION['error'] = $error;
				header("Location: ../index.php");
			}
		}
	}
*/
?>