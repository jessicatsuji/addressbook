function InterfaceActions() {
	var self = this;
	this.root;
	//Create new instance of ambassador class here
	
	this.ajaxAmbassador = new AjaxAmbassador();
	this.processing = new Processing();
	
	this.construct = function(element) {
		//construct ambassador class
		self.root = element;
		$('#addContact form').submit(function() {
			self.addContact(self.root);
		});
	}
	

	this.addContact = function(element) {
		self.ajaxAmbassador.construct(element);
		self.processing.construct(element);
	
	}
	
	this.editContact = function(element) {
		self.ajaxAmbassador.construct(element);
		self.processing.construct(element);
	
	this.addContact = function() {
		//Wait for event
			//ambassador.makeRequest(data)
			//Do something with returned data

	}
	

	this.addContact = function() {
		//Wait for event
			//ambassador.makeRequest(data)
			//Do something with returned data

	}
	

	this.editContact = function() {
		//Wait for event
			//ambassador.makeRequest(data)
			//Do something with returned data
	}
}