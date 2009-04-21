function Processing() {
	var self = this;
	this.root;
	
	//this.ajaxAmbassador = new AjaxAmbassador();
	
	this.construct = function() {
		//self.root = element;
	}
	
	this.addContact = function(returnData) {
		if(returnData['errorMessage']) {
			self.writeErrors(returnData);
		} else {
			//alert('ID: ' + returnData['id'] + ' added!');
			//alert('data: ' + returnData['data']['zip_code']);
			
			var content;
			
			content = 	'<div class="contactWidget">';
			content += '<a href="#" class="collapse">Edit</a>';
			
			//Mini Info
			content += '<div id="' + returnData['data']['id'] + '" class="contact interfaceElement">';
			content += '<img src="images/defaultPic.gif" />';
			content += '	<h3>' + returnData['data']['first_name'] + ' ' + returnData['data']['last_name'] + '</h3>';
			
			if(returnData['data']['company']) {
				content += '	<h5 class="company">' + returnData['data']['company'] + '</h5>';
			}
			if(returnData['data']['email']) {
				content += '	<address>' + returnData['data']['email'] + '</address>';
			}	
			if(returnData['data']['phone_one'] && returnData['data']['phone_two'] && returnData['data']['phone_three']) {
				content += '	<span class="phone">(' + returnData['data']['phone_one'] + ')-' + returnData['data']['phone_two'] + '-' + returnData['data']['phone_three'] + '</span>';
			}
			
			content += '	<span class=\"clear\"><!-- --></span>';	
			content += '</div>';
			
			//Form hidden by default until clicked
			content += 		'<form action="#" method="post" id="form_' + returnData['data']['id'] + '">';
			content += 			'<fieldset>';
			
			content += '<img src="images/defaultPic.gif" />';
			
			content += 				'<label>First Name:</label>';
			content += 				'<input type="text" name="firstName_' + returnData['data']['id'] + '" id="firstName_' + returnData['data']['id'] + '" value="' + returnData['data']['first_name'] + '" />';
			
			content += 				'<label>Last Name:</label>';
			content +=				'<input type="text" name="lastName_' + returnData['data']['id'] + '" id="lastName_' + returnData['data']['id'] + '" value="' + returnData['data']['last_name'] + '" />';
			
			content += 				'<label>Phone:</label>';
			content +=				'<div class="phone inputGroup">';
			content +=					'<input type="text" name="phone1_' + returnData['data']['id'] + '" id="phone1_' + returnData['data']['id'] + '" value="' + returnData['data']['phone_one'] + '" maxlength="3" size="3" />';
			content +=					'<input type="text" name="phone2_' + returnData['data']['id'] + '" id="phone2_' + returnData['data']['id'] + '" value="' + returnData['data']['phone_two'] + '" maxlength="3" size="3" />';
			content +=					'<input type="text" name="phone3_' + returnData['data']['id'] + '" id="phone3_' + returnData['data']['id'] + '" value="' + returnData['data']['phone_three'] + '" maxlength="4" size="4" />';
			content +=				'</div>';
			
			content +=				'<label>Email:</label>';
			content +=				'<input type="text" name="email_' + returnData['data']['id'] + '" id="email_' + returnData['data']['id'] + '" value="' + returnData['data']['email'] + '" />';
			
			content +=				'<label>Company:</label>';
			content +=				'<input type="text" name="company_' + returnData['data']['id'] + '" id="company_' + returnData['data']['id'] + '" value="' + returnData['data']['company'] + '" />';
			
			content +=				'<label>Address:</label>';
			content +=				'<div class="address">';
			content +=					'<input type="text" name="address1_' + returnData['data']['id'] + '" id="address1_' + returnData['data']['id'] + '" value="' + returnData['data']['address_one'] + '" />';
			content +=					'<input type="text" name="address2_' + returnData['data']['id'] + '" id="address2_' + returnData['data']['id'] + '" value="' + returnData['data']['address_two'] + '" />';
			content +=				'</div>';
									
			content +=				'<div class="areaInfo inputGroup">';
			content +=					'<label>City:</label>';
			content +=					'<input type="text" name="city_' + returnData['data']['id'] + '" id="city_' + returnData['data']['id'] + '" value="' + returnData['data']['city'] + '" />';
			
			content +=					'<label>State:</label>';
			content +=					'<select name="state" id="state">';
			
			//Checking the which option should be selected
			content += "				<option label=\"CA\" title=\"California\" value=\"1\"";
			content += (returnData['data']['state'] == '1') ? " selected=\"selected\"" : "";
			content += ">CA</option>		";
			
			content += "				<option label=\"HI\" title=\"Hawaii\" value=\"2\"";
			content += (returnData['data']['state'] == '2') ? " selected=\"selected\"" : "";
			content += ">HI</option>		";
			
			content += "				<option label=\"OR\" title=\"Oregon\" value=\"3\"";
			content += (returnData['data']['state'] == '3') ? " selected=\"selected\"" : "";
			content += ">OR</option>		";
			
			content += "				<option label=\"NV\" title=\"Nevada\" value=\"4\"";
			content += (returnData['data']['state'] == '4') ? " selected=\"selected\"" : "";
			content += ">NV</option>		";
			
			content += "				<option label=\"WA\" title=\"Washington\" value=\"5\"";
			content += (returnData['data']['state'] == '5') ? " selected=\"selected\"" : "";
			content += ">WA</option>		";
			
			
							
			content +=					'</select>';
			
			content +=					'<label>Zip:</label>';
			content +=					'<input type="text" name="zipCode_' + returnData['data']['id'] + '" id="zipCode_' + returnData['data']['id'] + '" value="' + returnData['data']['zip_code'] + '" maxlength="5" size="5" />';
			content +=				'</div>';
			
			content +=				'<label>Notes:</label>';
			content +=				'<textarea name="notes_' + returnData['data']['id'] + '" id="notes_' + returnData['data']['id'] + '">' + returnData['data']['notes'] + '</textarea>';
			
			content +=				'<button type="submit">Update</button>';
			content +=			'</fieldset>';
			content +=		'</form>';
			content +=	'</div>';
			
			$('#interfaceContent h4.error').remove();
			$('#interfaceContent').append( content );
			
			self.ajaxAmbassador = new AjaxAmbassador();
			
			var theForm = '#form_' + returnData['data']['id'];
			var theWidget = $(theForm).parent();
			
			$(theForm).bind('submit', function(){
				//alert('update widget #' + returnData['data']['id']);
			
				self.sendData = $(this).serialize();
				self.sendData += '&contactID=' + $(this).attr('id');
				self.script = "editContact";


				alert(self.sendData);
				self.ajaxResponse = self.ajaxAmbassador.makeRequest(self.sendData, self.script);
				return false;
			});
			
			
			$(theForm, theWidget).hide();
			$(".collapse",theWidget).toggle(function() {
				$('#addContact').hide();
				$('.contactWidget form').hide();
				$('.contactWidget .contact').fadeIn("fast");
				
				var widget = $(this).parent();
				$('.contact', widget).hide();
				$('form', widget).fadeIn("fast");
				$(this).text("Collapse");
			},
			function() {
				var widget = $(this).parent();
				$('form', widget).hide();
				$('.contact', widget).fadeIn("fast");
				$(this).text("Edit");
			});
			
			$("#addContact").slideUp("fast");

		}
	}
	
	this.editContact = function(returnData) {
		if(returnData) {
			//alert(returnData['id']);
			
			var miniInfo = $('#' + returnData['id']);
			var widget = $(miniInfo).parent();
			var form = $('form', widget);
			
			var firstName = $('#firstName_' + returnData['id'], form).val();
			var lastName = $('#lastName_' + returnData['id'], form).val();
			var company = $('#company_' + returnData['id'], form).val();
			var email = $('#email_' + returnData['id'], form).val();
			var phone1 = $('#phone1_' + returnData['id'], form).val();
			var phone2 = $('#phone2_' + returnData['id'], form).val();
			var phone3 = $('#phone3_' + returnData['id'], form).val();
			
			$(form).hide();
			
			var content = '<img src="images/defaultPic.gif" />';
			content += '	<h3>' + firstName + ' ' + lastName + '</h3>';
			
			if(company) {
				content += '	<h5 class="company">' + company + '</h5>';
			}
			if(email) {
				content += '	<address>' + email + '</address>';
			}	
			if(phone1 && phone2 && phone3) {
				content += '	<span class="phone">(' + phone1 + ')-' + phone2 + '-' + phone3 + '</span>';
			}
			
			content += '	<span class=\"clear\"><!-- --></span>';		
				
			$(miniInfo).show().html(content);
		} else {
			//add Contact
		}
	}
	
	this.writeErrors = function(returnData) {
		//do something with the errors
		alert(returnData['errorMessage']);
	}
}