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
			alert('added contact');
	}
	
	this.edit = function(response) {
		if(response)
			self.writeErrors();
		else
			//add Contact
	
	}
	
	this.writeErrors = function() {
		//do something with the errors
		alert('there was an error');
	}
}