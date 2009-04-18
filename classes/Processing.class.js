function Processing() {
	var self = this;
	this.root;
	
	this.construct = function(element) {
		self.root = element;
	}
	
	this.add = function(response) {
		if(response)
			self.writeErrors();
		else
			//add Contact
	}
	
	this.edit = function(response) {
		if(response)
			self.writeErrors();
		else
			//add Contact
	
	}
	
	this.writeErrors = function() {
		//do something with the errors
	}
}