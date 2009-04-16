<?php

function __autoload($class_name) {
	//dirname(__FILE__)
	if($class_name == 'LoadUsers' || $class_name == 'UpdateUsers') {
		require_once('classes' . DIRECTORY_SEPARATOR . $class_name . '.class.php');
	} else {
		require_once('..' . DIRECTORY_SEPARATOR .'classes' . DIRECTORY_SEPARATOR . $class_name . '.class.php');
	}
}

?>