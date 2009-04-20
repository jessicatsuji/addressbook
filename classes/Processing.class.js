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