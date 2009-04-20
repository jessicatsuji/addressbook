<?php
	require_once("classes/LoadContacts.class.php");
	require_once("classes/DbConnect.class.php");
	
	$loadContacts = new LoadContacts();
	$c_array = $loadContacts->contacts_array;
	$error = $loadContacts->error_message;
?>