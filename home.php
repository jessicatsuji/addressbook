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
					<form action="scripts/addContact.php" method="post">						
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
									<option label="CA" title="California" value="1">CA</option>
									<option label="HI" title="Hawaii" value="2">HI</option>
									<option label="OR" title="Oregon" value="3">OR</option>
									<option label="NV" title="Nevada" value="4">NV</option>
									<option label="WA" title="Washington" value="5">WA</option>
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
				
				<?php 
					foreach($loadContacts as $contact) {
						foreach($contact as $info) {
							echo "<div id=\"{$info['contact_id']}\" class=\"contact interfaceElement\">";
							echo "	<h3>{$info['first_name']} {$info['last_name']}</h3>";
							
							if($info['company']) {
								echo "	<h5 class=\"company\">{$info['company']}</h5>";
							}
							if($info['email']) {
								echo "	<address>{$info['email']}</address>";
							}
							if($info['phone_one'] && $info['phone_two'] && $info['phone_three']) {
								echo "	<span class=\"phone\">({$info['phone_one']})-{$info['phone_two']}-{$info['phone_three']}</address>";
							}
							echo "</div>";
							
							
							
							
							echo "<form action=\"scripts/editContact.php\" method=\"post\" id=\"form_{$info['contact_id']}\">				   			";		
							echo "	<fieldset>														   				";
							echo "		<label>First Name:</label>									   				";
							echo "		<input type=\"text\" name=\"firstName_{$info['contact_id']}\" value=\"{$info['first_name']}\" />	";
							echo "																	  				";
							echo "		<label>Last Name:</label>									   				";
							echo "		<input type=\"text\" name=\"lastName_{$info['contact_id']}\" value=\"{$info['last_name']}\" />	";
							echo "																	   				";
							echo "		<label>Phone:</label>										   				";
							echo "		<div class=\"phone inputGroup\">								   			";
							echo "			<input type=\"text\" name=\"phone1_{$info['contact_id']}\" value=\"{$info['phone_one']}\" />	";
							echo "			<input type=\"text\" name=\"phone2_{$info['contact_id']}\" value=\"{$info['phone_two']}\" />	";
							echo "			<input type=\"text\" name=\"phone3_{$info['contact_id']}\" value=\"{$info['phone_three']}\" />";
							echo "		</div>														   				";
							echo "																	   				";
							echo "		<label>Email:</label>										   				";
							echo "		<input type=\"text\" name=\"email_{$info['contact_id']}\" value=\"{$info['email']}\" />			";
							echo "																	  				";
							echo "		<label>Company:</label>										   				";
							echo "		<input type=\"text\" name=\"company_{$info['contact_id']}\" value=\"{$info['company']}\" />		";
							echo "																	   				";
							echo "		<label>Address:</label>										   				";
							echo "		<div class=\"address inputGroup\">							   				";
							echo "			<input type=\"text\" name=\"address1_{$info['contact_id']}\" value=\"{$info['address_one']}\" />";
							echo "			<input type=\"text\" name=\"address2_{$info['contact_id']}\" value=\"{$info['address_two']}\" />";
							echo "		</div>														   				";
							echo "																	   				";
							echo "		<div class=\"areaInfo inputGroup\">							   				";
							echo "			<label>City:</label>									   				";
							echo "			<input type=\"text\" name=\"city_{$info['contact_id']}\" value=\"{$info['city']}\" />			";
							echo "																	   				";
							echo "			<label>State:</label>									   				";
							echo "			<select name=\"state_{$info['contact_id']}\" id=\"state_{$info['contact_id']}\">						   			";
							
							
							echo "				<option label=\"CA\" title=\"California\" value=\"1\"";
							echo ($info['state'] == '1') ? " selected=\"selected\"" : "";
							echo ">CA</option>		";
							
							echo "				<option label=\"HI\" title=\"Hawaii\" value=\"2\"";
							echo ($info['state'] == '2') ? " selected=\"selected\"" : "";
							echo ">HI</option>		";
							
							echo "				<option label=\"OR\" title=\"Oregon\" value=\"3\"";
							echo ($info['state'] == '3') ? " selected=\"selected\"" : "";
							echo ">OR</option>		";
							
							echo "				<option label=\"NV\" title=\"Nevada\" value=\"4\"";
							echo ($info['state'] == '4') ? " selected=\"selected\"" : "";
							echo ">NV</option>		";
							
							echo "				<option label=\"WA\" title=\"Washington\" value=\"5\"";
							echo ($info['state'] == '5') ? " selected=\"selected\"" : "";
							echo ">WA</option>		";
							
							
							
							echo "			</select>												   				";
							echo "																	   				";
							echo "			<label>Zip:</label>										   				";
							echo "			<input type=\"text\" name=\"zipCode_{$info['contact_id']}\" value=\"{$info['zip_code']}\" />	";
							echo "		</div>														   				";
							echo "																	   				";
							echo "		<label>Notes:</label>										   				";
							echo "		<textarea name=\"notes_{$info['contact_id']}\">{$info['notes']}</textarea>				   	";
							echo "																	   				";
							echo "		<button type=\"submit\">Submit</button>						   				";
							echo "	</fieldset>														   				";
							echo "</form>															   				";
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>