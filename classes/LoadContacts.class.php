<?php
	class LoadContacts {
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
		private $contacts;
		private $contact;
		public static $error_message = NULL;
		public static $contacts_array;
		
		public function __construct() {			
			//Query to getContacts on initial page load
			$this->getContacts();
		}
		
		private function getContacts() {
			$this->table = 'contacts';
		
			//Select query
			$this->query_string = "SELECT * FROM %s WHERE user_id = '%s'";
				
			//Package array for query arguments
			$this->packageArguments();
	
			//Connect to database
			$this->db = DbConnect::get();
			
			//Query db
			$this->result = $this->db->query($this->query_string, $this->arguments);
			
			//Reset Session
			$this->contacts_array = array();
				
			//Turn result into associative array
			if(mysql_num_rows($this->result)) {
				while($this->contacts = mysql_fetch_array($this->result, MYSQL_ASSOC)) {
					$this->contact = array('contact_id'=>$this->contacts['id'],
											'first_name'=>$this->contacts['first_name']
											);
					
					array_push($this->contacts_array, $this->contact);
				}
			} else {
				$this->contacts_array = "You have No Contacts";
			}

		}
		
		private function packageArguments() {
			$this->arguments = array($this->table, $_SESSION['current_user_id']);
			return true;
		}

	}

?>