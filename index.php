<?php
	session_start();
	
	if (isset($_SESSION['current_user'])) {
		header("Location: home.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>AddressBook App</title>
	<link type="text/css" rel="stylesheet" href="css/master.css" media="all" />
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/jqueryUI.js"></script>
	<script type="text/javascript" src="scripts/signIn.js"></script>
	<script type="text/javascript">
		$(function() {
			hideRegister();
			var json = {
				"firstname" : "kellan",
				"lastname" : "craddock",
				"age" : "24"
			};
			alert("hi");
		});
	</script>
</head>

<body>
		<h1>Logo</h1>
		<div id="signIn">
			<div id="signInTop">
				<h2>Sign In</h2>
			</div>
			<div id="signInBody">
				<div id="formWrapper">
					<form action="scripts/login.php" method="post">
						
							<?php if (isset($_SESSION['error'])) 
								echo "<p class=\"signInError\">" . $_SESSION['error'] . "</p>"; 
							?>
						
						<fieldset>
							<label>User Name:</label>
							<input type="text" name="userName" />
							
							<label>Password:</label>
							<input type="password" name="password" />
							
							<button type="submit">Submit</button>
						</fieldset>
					</form>
					
					<h2 id="createAccount">+ Create Account</h2>
					<form id="createBox" action="scripts/createUser.php" method="post">
						<!-- <p class="signInError"><?php if (isset($_SESSION['error'])) echo $_SESSION['error']; ?></p> -->
						<fieldset>
							<label for="firstName">First Name:</label>
							<input type="text" id="firstName" name="firstName" />
							
							<label for="userName">User Name:</label>
							<input type="text" id="userName" name="userName" />
							
							<label for="password">Password:</label>
							<input type="password" id="password" name="password" />
							
							<label for="verifyPass">Verify Password:</label>
							<input type="password" id="verifyPass" name="verifyPass" />
							
							<button type="submit">Submit</button>
							
						</fieldset>
					</form>
				</div>
			</div>
			<div id="signInBottom"><!-- --></div>
		</div>
		
		<div class="clear"><!-- --></div>
	</div>

</body>
</html>