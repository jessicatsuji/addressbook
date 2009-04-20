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
			
			content = 	'<div id="addContact">';
			content += 		'<form action="#" method="post">';
			content += 			'<fieldset>';
			content += 				'<label>First Name:</label>';
			content += 				'<input type="text" name="firstName" />';
			
			content += 				'<label>Last Name:</label>';
			content +=				'<input type="text" name="lastName" />';
			
			content += 				'<label>Phone:</label>';
			content +=				'<div class="phone inputGroup">';
			content +=					'<input type="text" name="phone1" />';
			content +=					'<input type="text" name="phone2" />';
			content +=					'<input type="text" name="phone3" />';
			content +=				'</div>';
			
			content +=				'<label>Email:</label>';
			content +=				'<input type="text" name="email" />';
			
			content +=				'<label>Company:</label>';
			content +=				'<input type="text" name="company" />';
			
			content +=				'<label>Address:</label>';
			content +=				'<div class="address inputGroup">';
			
			content +=					'<input type="text" name="address1" />';
			content +=					'<input type="text" name="address2" />';
			content +=				'</div>';
									
			content +=				'<div class="areaInfo inputGroup">';
			content +=					'<label>City:</label>';
			content +=					'<input type="text" name="city" />';
			
			content +=					'<label>State:</label>';
			content +=					'<select name="state" id="state">';
			content +=						'<option label="OR" title="Oregon" value="1">OR</option>';
			content +=					'</select>';
			
			content +=					'<label>Zip:</label>';
			content +=					'<input type="text" name="zipCode" />';
			content +=				'</div>';
			
			content +=				'<label>Notes:</label>';
			content +=				'<textarea name="notes"></textarea>';
			
			content +=				'<button type="submit">Submit</button>';
			content +=			'</fieldset>';
			content +=		'</form>';
			content +=	'</div>';
			
			$('#interfaceContent', self.root).append( content );
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