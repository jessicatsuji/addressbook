<?php
	class AddContact {
		private $first_name;
		private $last_name; 
		private $phone_one; 
		private $phone_two; 
		private $phone_three; 
		private $email;
		private $company;
		private $address_one; 
		private $address_two; 
		private $city;
		private $state;
		private $zip_code;
		private $notes;
		private $db;
		private $table;
		private $logged_in;
		private $query_string;
		private $arguments;
		private $result;
		private $line;
		private static $return_array;
		private static $contact_id = NULL;
		private static $error_message = NULL;
		
		public function __construct() {
			
			//Checks the posts for spaces, blanks, and matching passwords
			$this->validateInfo();
			
			//Checks the $error variable, if set then set errors and redirect to index else query db
			$this->handleInfo();
		}
		
		private function validateInfo() {
			//If all post variables are set
			if (isset($_POST['firstName'] && $_POST['firstName'] != '') {
			
				//return true;
			
			} else {
				$this->error_message .= "First Name is Required";
			}
		}
		
		private function handleInfo() {
			//If no errors, query db
			if(!isset($this->error_message)) {
				$this->first_name = $_POST['firstName'];
				$this->last_name = $_POST['lastName'];
				$this->phone_one = $_POST['phone1'];
				$this->phone_two = $_POST['phone2'];
				$this->phone_three = $_POST['phone3'];
				$this->email = $_POST['email'];
				$this->company = $_POST['compmany'];
				$this->address_one = $_POST['address1'];
				$this->address_two = $_POST['address2'];
				$this->city = $_POST['city'];
				$this->state = $_POST['state'];
				$this->zip_code = $_POST['zipCode'];
				$this->notes = $_POST['notes'];
				$this->table = "contacts";

				//Select query
				$this->query_string = "INSERT INTO %s (first_name, last_name, phone_one, phone_two, phone_three, email, company, address_one, address_two, city, state, zip_code, notes, user_id) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',);";
				
				//Package array for query arguments
				$this->packageInsertArguments();
		
				//Connect to database
				$this->db = DbConnect::get();
						
				//call query method
				$this->result = $this->db->query($this->query_string, $this->arguments);
				
				//Grab last id from inserted row
				$this->contact_id = mysql_insert_id();
				
				//Check to see if user name already exists and redirect, else create new user
				if ($this->contact_id) {
					$return_array = array('id'=>$this->contact_id, 'errorMessage'=>NULL);
				} else {
					$this->error_message = 'Unable to add contact';
					$return_array = array('id'=>$this->contact_id, 'errorMessage'=>$this->error_message);
				}
			//If errors, set session and redirect
			} else {
				$return_array = array('id'=>$this->contact_id, 'errorMessage'=>$this->error_message);
			}

		}
		
		private function packageInsertArguments() {
			$this->arguments = array($this->table, $this->first_name, $this->last_name, $this->phone_one, $this->phone_two, $this->phone_three, $this->email, $this->company, $this->address_one, $this->address_two, $this->city, $this->state, $this->zip_code, $this->notes, $_SESSION['current_user']);
			return true;
		}

	}

?>