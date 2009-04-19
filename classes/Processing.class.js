function Processing() {
	var self = this;
	this.root;
	
	this.construct = function(element) {
		self.root = element;
	}
	
	this.add = function(returnData) {
		if(returnData['errorMessage'] != NULL) {
			self.writeErrors(returnData);
		} else {
			alert('ID: ' + returnData['id'] + ' added!');
		}	
	}
	
	this.edit = function(returnData) {
		if(returnData) {
			self.writeErrors();
		} else {
			//add Contact
		}	
	
	}
	
	this.writeErrors = function(returnData) {
		//do something with the errors
		alert(returnData['errorMessage']);
	}
}