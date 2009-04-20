<?php
	session_start();
	require_once("../classes/EditContact.class.php");
	require_once("../classes/DbConnect.class.php");
	
	$editContact = new EditContact();
	$returnArray = $editContact->return_array;
	//$returnArray = array("id"=>1, "message"=>"error message");
	$data = json_encode($returnArray);
	echo $data;
?>