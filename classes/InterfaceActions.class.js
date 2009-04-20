function InterfaceActions() {
	var self = this;
	this.root;
	//Create new instance of ambassador class here
	
	this.ajaxAmbassador = new AjaxAmbassador();
	
	this.construct = function(element) {
		//construct ambassador class
		self.root = element;
		
		self.ajaxAmbassador.construct(element);
		
		//Hide/Show add contact panel
		self.showAddPanel(element);
		
		$('#addContactForm', element).bind('submit', function() {
			self.addContact(self.root);
			return false;
		});
		
		$('#interfaceContent .contactWidget').each(function() {
			self.setContactHide(this);
		});
		
		$('#interfaceContent form').each(function() {
			$(this).bind('submit', function(){
				self.editContact(this);
				return false;
			});
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
	
	this.setContactHide = function(element) {
		
		$("form", element).hide();
		$(".collapse",element).toggle(function() {
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
			
			self.sendData = $(element).serialize();
			self.sendData += '&contactID=' + $(element).attr('id');
			self.script = "editContact"
			
			self.ajaxResponse = self.ajaxAmbassador.makeRequest(self.sendData, self.script);
	

	}
}