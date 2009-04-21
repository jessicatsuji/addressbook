/**
 * Creates a AddressBookApp class that lets the logged in user add and edit information for their Contacts.
 * @class AddressBookApp Instantiates the InterfaceActions class that will control/bind the adding & editing functionality for contacts to HTML elements.
 * @version 1.0
 * 
 * @property {Object} self Internal reference to <code>this</code>.
 * @property {Object} root jQuery Dom Reference to root node for instance.
 * 
 */

function AddressBookApp() {
	var self = this;
	this.root;
	
	/**
	 * Creates an instance of the InterfaceActions class to be used to handle event binding & adding/edit actions which calls AjaxAmbassador class
	 * @see InterfaceActions
	 * @returns {Object} Returns an instance of InterfaceActions object.
	 */
	this.interfaceActions = new InterfaceActions();
	
	/**
	 * @constructor
	 * @param {Object} element The $('#wrapper') jQuery DOM reference, containing all adding forms, editing forms, & rest of HTML structure.
	 */
	this.construct = function(element) {
		self.root = element;
		self.interfaceActions.construct(self.root);
	}
}