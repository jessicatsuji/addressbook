<?php
	class EditContact {
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
		private static $contact_id = NULL;
		private $real_contact_id;
		
		public function __construct() {
			
			//Checks the posts for spaces, blanks, and matching passwords
			//$this->validateInfo();
			
			//Checks the $error variable, if set then set errors and redirect to index else query db
			$this->handleInfo();
		}
		
		private function validateInfo() {
			//If all post variables are set
			if (isset($_POST['firstName']) && $_POST['firstName'] != '') {
			
				//return true;
			
			} else {
				$this->error_message .= "First Name is Required";
			}
		}
		
		private function handleInfo() {
			// This is dirty...gross...
			$result = preg_split( "/firstName/", $_POST['firstName']);
			$contact_id = $result[1];
			
			$realResult = preg_split( "/_/", $contact_id );
			$real_contact_id = $realResult[1];
			
			$this->return_array = $real_contact_id;
			/*
			$this->first_name = $_POST['firstName'] . $contact_id;
			$this->last_name = $_POST['lastName'] . $contact_id;
			$this->phone_one = $_POST['phone1'] . $contact_id;
			$this->phone_two = $_POST['phone2'] . $contact_id;
			$this->phone_three = $_POST['phone3'] . $contact_id;
			$this->email = $_POST['email'] . $contact_id;
			$this->company = $_POST['company'] . $contact_id;
			$this->address_one = $_POST['address1'] . $contact_id;
			$this->address_two = $_POST['address2'] . $contact_id;
			$this->city = $_POST['city'] . $contact_id;
			$this->state = $_POST['state'] . $contact_id;
			$this->zip_code = $_POST['zipCode'] . $contact_id;
			$this->notes = $_POST['notes'] . $contact_id;
			$this->table = "contacts";

			//Insert query
			$this->query_string = "UPDATE %s SET (first_name, last_name, phone_one, phone_two, phone_three, email, company, address_one, address_two, city, state, zip_code, notes, user_id) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s') WHERE user_id = '%s';";
			
			//Package array for query arguments
			$this->packageEditArguments();
	
			//Connect to database
			$this->db = DbConnect::get();
					
			//call query method
			//$this->result = $this->db->query($this->query_string, $this->arguments);
*/
		}
		
		private function packageEditArguments() {
			$this->arguments = array($this->table, $this->first_name, $this->last_name, $this->phone_one, $this->phone_two, $this->phone_three, $this->email, $this->company, $this->address_one, $this->address_two, $this->city, $this->state, $this->zip_code, $this->notes, $real_contact_id);
			return true;
		}

	}

?>