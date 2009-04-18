function AddressBookApp() {
	var self = this;
	this.root;
	this.interfaceActions = new InterfaceActions();
	
	this.construct = function(element) {
		self.root = element;
		self.interfaceActions.construct(self.root);
	}
}