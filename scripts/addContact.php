<?php
	session_start();
	require_once("../classes/AddContact.class.php");
	require_once("../classes/DbConnect.class.php");
	
	$addContact = new AddContact();
	$retunArray = $addContact->return_array;
	//$returnArray = array("id"=>1, "message"=>"error message");
	$data = json_encode($returnArray);
	echo $data;
?>