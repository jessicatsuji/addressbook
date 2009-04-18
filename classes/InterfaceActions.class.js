function InterfaceActions() {
	var self = this;
	this.root;
	
	this.ajaxAmbassador = new AjaxAmbassador();
	this.processing = new Processing();
	
	this.construct = function(element) {
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
	
	}
}