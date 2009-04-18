<?php
	session_start();
	//include('scripts/loadUsers.php');
	if (!isset($_SESSION['current_user'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>AddressBook App</title>
	<link type="text/css" rel="stylesheet" href="css/mainStyles.css" media="all" />
	<!-- Libraries -->
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/jqueryUI.js"></script>
	<!-- Classes -->
	<script type="text/javascript" src="classes/ChatApp.class.js"></script>
	<!-- Scripts -->
	<script type="text/javascript" src="scripts/chatApp.js"></script>

</head>

<body>
	<div id="wrapper">
		<div id="controlBarWrapper">
			<div id="controlBarContent">
				<h1>Logo</h1>
				<h2>Welcome, User!</h2>
				<span id="preloader"></span>
				<div id="addContact">
					<!-- form goes here -->
				</div>
			</div>
		</div>
		<div id="interfaceWrapper">
			<div id="interfaceContent">
				<div id="0" class="contact interfaceElement">
				</div>
			</div>
		</div>
	</div>
</body>
</html>