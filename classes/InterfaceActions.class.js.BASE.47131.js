function InterfaceActions() {
	var self = this;
	this.root;
	
	this.ajaxAmbassador = new AjaxAmbassador();
	this.processing = new Processing();
	
	this.construct = function(element) {
		self.root = element;
		self.ajaxAmbassador.construct(self.root);
		self.processing.construct(self.root);
	}
	
	this.addContact = function() {
	
	}
	
	this.editContact = function() {
	
	}
}