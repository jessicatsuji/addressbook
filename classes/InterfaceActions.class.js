function InterfaceActions() {
	var self = this;
	this.root;
	//Create new instance of ambassador class here
	
	this.ajaxAmbassador = new AjaxAmbassador();
	this.processing = new Processing();
	
	this.construct = function(element) {
		//construct ambassador class
		self.root = element;
		
		//self.ajaxAmbassador.construct(element);
		self.processing.construct(element);
		
		$('#addContact form').submit(function() {
			self.addContact(self.root);
		});
	}
	

	this.addContact = function(element) {
		//Wait for event
			//ambassador.makeRequest(data)
			//Do something with returned data
			//self.ajaxResponse = self.ajaxAmbassador.makeRequest();
			self.sendData = $(element + " #addContact form").serialize();
			self.script = "addContact"
			
			self.ajaxResponse = self.ajaxAmbassador.construct(self.sendData, self.script);
			self.processing.add(self.ajaxResponse);
			
	
	}
	
	this.editContact = function(element) {
		//Wait for event
			//ambassador.makeRequest(data)
			//Do something with returned data
			//self.ajaxResponse = self.ajaxAmbassador.makeRequest();
			
			self.sendData = $(element + " #editContact form").serialize();
			self.script = "editContact"
			
			self.ajaxResponse = self.ajaxAmbassador.construct(self.sendData, self.script);
			self.processing.edit(self.ajaxResponse);
	

	}
}