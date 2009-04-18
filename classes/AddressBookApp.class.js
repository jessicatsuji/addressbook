function AddressBookApp() {
	var self = this;
	this.root;
	
	this.interfaceActions = new InterfaceActions();
	
	this.construct = function(element) {
		self.root = element;
		self.interfaceActions.construct(self.root);
		
		self.addContact = self.interfaceActions.addContact();
		self.editContact = self.interfaceActions.editContact();
	}
}