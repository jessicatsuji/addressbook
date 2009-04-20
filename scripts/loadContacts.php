<?php
	require_once("classes/LoadContacts.class.php");
	require_once("classes/DbConnect.class.php");
	
	$loadContacts = new LoadContacts();
	$c_array = $loadContacts->contacts_array;
	
	
	if($c_array) {
		foreach($c_array as $info) {
			echo "<div class=\"contactWidget\">";
			
			echo "<a href=\"#\" class=\"collapse\">Edit</a>";
			
			//Mini Info
			echo "<div id=\"{$info['contact_id']}\" class=\"contact interfaceElement\">";
			echo "<img src=\"images/defaultPic.gif\" />";
			echo "	<h3>{$info['first_name']} {$info['last_name']}</h3>";
			
			if($info['company']) {
				echo "	<h5 class=\"company\">{$info['company']}</h5>";
			}
			if($info['email']) {
				echo "	<address>{$info['email']}</address>";
			}
			if($info['phone_one'] && $info['phone_two'] && $info['phone_three']) {
				echo "	<span class=\"phone\">({$info['phone_one']})-{$info['phone_two']}-{$info['phone_three']}</span>";
			}
			echo "	<span class=\"clear\"><!-- --></span>";
			echo "</div>";
			
			
			
			//Form hidden by default until clicked
			echo "<form action=\"scripts/editContact.php\" method=\"post\" id=\"form_{$info['contact_id']}\">				   			";		
			echo "	<fieldset>														   				";
			echo "		<label>First Name:</label>									   				";
			echo "		<input type=\"text\" name=\"firstName_{$info['contact_id']}\" id=\"firstName_{$info['contact_id']}\" value=\"{$info['first_name']}\" />	";
			echo "																	  				";
			echo "		<label>Last Name:</label>									   				";
			echo "		<input type=\"text\" name=\"lastName_{$info['contact_id']}\" id=\"lastName_{$info['contact_id']}\" value=\"{$info['last_name']}\" />	";
			echo "																	   				";
			echo "		<label>Phone:</label>										   				";
			echo "		<div class=\"phone inputGroup\">								   			";
			echo "			<input type=\"text\" name=\"phone1_{$info['contact_id']}\" id=\"phone1_{$info['contact_id']}\" value=\"{$info['phone_one']}\" />	";
			echo "			<input type=\"text\" name=\"phone2_{$info['contact_id']}\" id=\"phone2_{$info['contact_id']}\" value=\"{$info['phone_two']}\" />	";
			echo "			<input type=\"text\" name=\"phone3_{$info['contact_id']}\" id=\"phone3_{$info['contact_id']}\" value=\"{$info['phone_three']}\" />";
			echo "		</div>														   				";
			echo "																	   				";
			echo "		<label>Email:</label>										   				";
			echo "		<input type=\"text\" name=\"email_{$info['contact_id']}\" id=\"email_{$info['contact_id']}\" value=\"{$info['email']}\" />			";
			echo "																	  				";
			echo "		<label>Company:</label>										   				";
			echo "		<input type=\"text\" name=\"company_{$info['contact_id']}\" id=\"company_{$info['contact_id']}\" value=\"{$info['company']}\" />		";
			echo "																	   				";
			echo "		<label>Address:</label>										   				";
			echo "		<div class=\"address inputGroup\">							   				";
			echo "			<input type=\"text\" name=\"address1_{$info['contact_id']}\" id=\"address1_{$info['contact_id']}\" value=\"{$info['address_one']}\" />";
			echo "			<input type=\"text\" name=\"address2_{$info['contact_id']}\" id=\"address2_{$info['contact_id']}\" value=\"{$info['address_two']}\" />";
			echo "		</div>														   				";
			echo "																	   				";
			echo "		<div class=\"areaInfo inputGroup\">							   				";
			echo "			<label>City:</label>									   				";
			echo "			<input type=\"text\" name=\"city_{$info['contact_id']}\" id=\"city_{$info['contact_id']}\" value=\"{$info['city']}\" />			";
			echo "																	   				";
			echo "			<label>State:</label>									   				";
			echo "			<select name=\"state_{$info['contact_id']}\" id=\"state_{$info['contact_id']}\">						   			";
			
			//Check which option should be selected
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
			echo "			<input type=\"text\" name=\"zipCode_{$info['contact_id']}\" id=\"zipCode_{$info['contact_id']}\" value=\"{$info['zip_code']}\" />	";
			echo "		</div>														   				";
			echo "																	   				";
			echo "		<label>Notes:</label>										   				";
			echo "		<textarea name=\"notes_{$info['contact_id']}\" id=\"notes_{$info['contact_id']}\">{$info['notes']}</textarea>				   	";
			echo "																	   				";
			echo "		<button type=\"submit\">Submit</button>						   				";
			echo "	</fieldset>														   				";
			echo "</form>															   				";
			
			
			echo "</div>";
		}
	} else {
		echo "<h4 class=\"error\">No Contacts</h4>";
	}
?>