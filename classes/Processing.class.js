function Processing() {
	var self = this;
	this.root;
	
	this.construct = function(element) {
		self.root = element;
	}
	
	this.addContact = function(returnData) {
		if(returnData['errorMessage']) {
			self.writeErrors(returnData);
		} else {
			alert('ID: ' + returnData['id'] + ' added!');
			alert('data: ' + returnData['data']['zip_code']);
			
			var content;
			
			content = 	'<div class="contactWidget">';
			content += 		'<form action="#" method="post">';
			content += 			'<fieldset>';
			content += 				'<label>First Name:</label>';
			content += 				'<input type="text" name="firstName_' + returnData['data']['id'] + '" id="firstName_' + returnData['data']['id'] + '" value="' + returnData['data']['first_name'] + '" />';
			
			content += 				'<label>Last Name:</label>';
			content +=				'<input type="text" name="lastName_' + returnData['data']['id'] + '" id="lastName_' + returnData['data']['id'] + '" value="' + returnData['data']['last_name'] + '" />';
			
			content += 				'<label>Phone:</label>';
			content +=				'<div class="phone inputGroup">';
			content +=					'<input type="text" name="phone1_' + returnData['data']['id'] + '" id="phone1_' + returnData['data']['id'] + '" value="' + returnData['data']['phone_one'] + '" />';
			content +=					'<input type="text" name="phone2_' + returnData['data']['id'] + '" id="phone2_' + returnData['data']['id'] + '" value="' + returnData['data']['phone_two'] + '" />';
			content +=					'<input type="text" name="phone3_' + returnData['data']['id'] + '" id="phone3_' + returnData['data']['id'] + '" value="' + returnData['data']['phone_three'] + '" />';
			content +=				'</div>';
			
			content +=				'<label>Email:</label>';
			content +=				'<input type="text" name="email_' + returnData['data']['id'] + '" id="email_' + returnData['data']['id'] + '" value="' + returnData['data']['email'] + '" />';
			
			content +=				'<label>Company:</label>';
			content +=				'<input type="text" name="company_' + returnData['data']['id'] + '" id="company_' + returnData['data']['id'] + '" value="' + returnData['data']['company'] + '" />';
			
			content +=				'<label>Address:</label>';
			content +=				'<div class="address inputGroup">';
			content +=					'<input type="text" name="address1_' + returnData['data']['id'] + '" id="address1_' + returnData['data']['id'] + '" value="' + returnData['data']['address_one'] + '" />';
			content +=					'<input type="text" name="address2_' + returnData['data']['id'] + '" id="address2_' + returnData['data']['id'] + '" value="' + returnData['data']['address_two'] + '" />';
			content +=				'</div>';
									
			content +=				'<div class="areaInfo inputGroup">';
			content +=					'<label>City:</label>';
			content +=					'<input type="text" name="city_' + returnData['data']['id'] + '" id="city_' + returnData['data']['id'] + '" value="' + returnData['data']['city'] + '" />';
			
			content +=					'<label>State:</label>';
			content +=					'<select name="state" id="state">';
			content +=						'<option label="OR" title="Oregon" value="1">OR</option>';
			content +=					'</select>';
			
			content +=					'<label>Zip:</label>';
			content +=					'<input type="text" name="zipCode_' + returnData['data']['id'] + '" id="zipCode_' + returnData['data']['id'] + '" value="' + returnData['data']['zip_code'] + '" />';
			content +=				'</div>';
			
			content +=				'<label>Notes:</label>';
			content +=				'<textarea name="notes_' + returnData['data']['id'] + '" id="notes_' + returnData['data']['id'] + '">' + returnData['data']['notes'] + '</textarea>';
			
			content +=				'<button type="submit" id="updateBtn_' + returnData['data']['id'] + '">Update</button>';
			content +=			'</fieldset>';
			content +=		'</form>';
			content +=	'</div>';
			
			$('#interfaceContent', self.root).append( content );
			$( '#updateBtn_' + returnData['data']['id'], self.root).bind('submit',function(){
				alert('update widget #' + returnData['data']['id']);
				return false;
			});
		}
	}
	
	this.edit = function(returnID, returnError) {
		if(returnError) {
			self.writeErrors(returnError);
		} else {
			//add Contact
		}
	}
	
	this.writeErrors = function(returnData) {
		//do something with the errors
		alert(returnData['errorMessage']);
	}
}