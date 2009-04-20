<?php
	session_start();
	if (!isset($_SESSION['current_user'])) {
		header("Location: index.php");
	} else {
		include('scripts/loadContacts.php');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>AddressBook App</title>
	<link type="text/css" rel="stylesheet" href="css/master.css" media="all" />
	<!-- Libraries -->
	<script type="text/javascript" src="libraries/jquery.js"></script>
	<script type="text/javascript" src="libraries/jqueryUI.js"></script>
	<!-- Classes -->
	<script type="text/javascript" src="classes/AddressBookApp.class.js"></script>
	<script type="text/javascript" src="classes/InterfaceActions.class.js"></script>
	<script type="text/javascript" src="classes/AjaxAmbassador.class.js"></script>
	<script type="text/javascript" src="classes/Processing.class.js"></script>
	<!-- Scripts -->
	<script type="text/javascript" src="scripts/addressBookApp.js"></script>

</head>

<body>
	<div id="wrapper">
		<div id="controlBarWrapper">
			<div id="controlBarContent">
				<h1><?php echo $_SESSION['current_user'] ?>'s <span>addressBook</span></h1>
				<a class="logout" href="scripts/logout.php">Logout</a>
				<span id="preloader"></span>
				<div id="addBtn"><span>Add Contact</span></div>
				<div class="clear"><!-- --></div>
				<div id="addContact">
					<form action="#" method="post">						
						<fieldset>
							<label>First Name:</label>
							<input type="text" name="firstName" />
							
							<label>Last Name:</label>
							<input type="text" name="lastName" />
							
							<label>Phone:</label>
							<div class="phone inputGroup">
								<input type="text" name="phone1" />
								<input type="text" name="phone2" />
								<input type="text" name="phone3" />
							</div>
							
							<label>Email:</label>
							<input type="text" name="email" />
							
							<label>Company:</label>
							<input type="text" name="company" />
							
							<label>Address:</label>
							<div class="address inputGroup">
								<input type="text" name="address1" />
								<input type="text" name="address2" />
							</div>
							
							<div class="areaInfo inputGroup">
								<label>City:</label>
								<input type="text" name="city" />
								
								<label>State:</label>
								<select name="state" id="state">
									<option label="OR" title="Oregon" value="1">OR</option>
								</select>
								
								<label>Zip:</label>
								<input type="text" name="zipCode" />
							</div>
							
							<label>Notes:</label>
							<textarea name="notes"></textarea>
							
							<button type="submit">Submit</button>
						</fieldset>
					</form>
				</div>
				<div class="clear"><!-- --></div>
			</div>
		</div>
		<div id="interfaceWrapper">
			<div id="interfaceContent">
				<!-- dynamic contact element
				<div id="0" class="contact interfaceElement">
				</div>
				-->
			</div>
		</div>
	</div>
</body>
</html>