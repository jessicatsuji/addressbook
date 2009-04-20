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
		
			//Sets Post Values
			$this->setValues();
			
			//Checks the posts for spaces, blanks, and matching passwords
			$this->validateInfo();
			
			//Checks the $error variable, if set then set errors and redirect to index else query db
			$this->handleInfo();
		}
		
		private function setValues() {
			//Get the contact_id
			$this->real_contact_id = str_replace( "form_", "", $_POST['contactID']);
			
			//Set Post Values
			$this->first_name = $_POST['firstName_' . $this->real_contact_id];
			$this->last_name = $_POST['lastName_' . $this->real_contact_id];
			$this->phone_one = $_POST['phone1_' . $this->real_contact_id];
			$this->phone_two = $_POST['phone2_' . $this->real_contact_id];
			$this->phone_three = $_POST['phone3_' . $this->real_contact_id];
			$this->email = $_POST['email_' . $this->real_contact_id];
			$this->company = $_POST['company_' . $this->real_contact_id];
			$this->address_one = $_POST['address1_' . $this->real_contact_id];
			$this->address_two = $_POST['address2_' . $this->real_contact_id];
			$this->city = $_POST['city_' . $this->real_contact_id];
			$this->state = $_POST['state_' . $this->real_contact_id];
			$this->zip_code = $_POST['zipCode_' . $this->real_contact_id];
			$this->notes = $_POST['notes_' . $this->real_contact_id];
			$this->table = "contacts";
			
			//$this->return_array = $this->first_name;
		}
		
		private function validateInfo() {
			//If all post variables are set
			if (isset($_POST['firstName_' . $this->real_contact_id]) && $_POST['firstName_' . $this->real_contact_id] != '') {
			
				//return true;
			
			} else {
				$this->error_message .= "First Name is Required";
			}
		}
		
		private function handleInfo() {
			//If no errors, query db
			if(!isset($this->error_message)) {
				//Update query
				$this->query_string = "UPDATE %s SET first_name = '%s', last_name = '%s', phone_one = '%s', phone_two = '%s', phone_three = '%s', email = '%s', company = '%s', address_one = '%s', address_two = '%s', city = '%s', state = '%s', zip_code = '%s', notes = '%s', user_id = '%s' WHERE id = '%s';";
				
				//Package array for query arguments
				$this->packageEditArguments();
		
				//Connect to database
				$this->db = DbConnect::get();
						
				//call query method
				$this->result = $this->db->query($this->query_string, $this->arguments);
				
				
				$this->return_array = array('id'=>$this->real_contact_id, 'errorMessage'=>$this->error_message);
				
			//If errors, set session and redirect
			} else {
				$this->return_array = array('id'=>$this->real_contact_id, 'errorMessage'=>$this->error_message);
			}
		}
		
		private function packageEditArguments() {
			$this->arguments = array($this->table, $this->first_name, $this->last_name, $this->phone_one, $this->phone_two, $this->phone_three, $this->email, $this->company, $this->address_one, $this->address_two, $this->city, $this->state, $this->zip_code, $this->notes, $_SESSION['current_user_id'], $this->real_contact_id);
			return true;
		}

	}

?>