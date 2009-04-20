function InterfaceActions() {
	var self = this;
	this.root;
	//Create new instance of ambassador class here
	
	this.ajaxAmbassador = new AjaxAmbassador();
	
	this.construct = function(element) {
		//construct ambassador class
		self.root = element;
		
		//self.ajaxAmbassador.construct(element);
		self.processing.construct(element);
		
		//Hide/Show add contact panel
		self.showAddPanel(element);
		
		$('#addContact form').bind('submit', function() {
			self.addContact(self.root);
			return false;
		});
	}
	
	this.showAddPanel = function(element) {
		var addBtn = $("#addBtn", element);
		var addPanel = $("#addContact", element);
		
		addPanel.hide();
		addBtn.toggle(
			function() {
				addPanel.fadeIn("fast");
			},
			function() {
				addPanel.fadeOut("fast");
			}
		);
	}

	this.addContact = function(element) {
		//Wait for event
			//ambassador.makeRequest(data)
			//Do something with returned data
			//self.ajaxResponse = self.ajaxAmbassador.makeRequest();
			self.sendData = $("#addContact form", element).serialize();
			self.script = "addContact";
			
			self.ajaxResponse = self.ajaxAmbassador.makeRequest(self.sendData, self.script);
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