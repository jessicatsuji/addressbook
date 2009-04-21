/**
 * Creates a InterfaceActions binds all events to HTML elements for UI & instansiates the AjaxAmbassador class for functionality.
 * @class InterfaceActions Handles user events, hide/show the panel to add a new contact, hide/show mini info contact widget & the editing contact info form, & handles adding & editing methods.
 * @version 1.0
 * 
 * @property {Object} self Internal reference to <code>this</code>.
 * @property {Object} root jQuery Dom Reference to root node for instance.
 * 
 */
 
 function InterfaceActions() {
	var self = this;
	this.root;
	
	/**
	 * Creates an instance of the AjaxAmbassador class to be used to handle firing ajax & handling ajax response.
	 * @see AjaxAmbassador
	 * @returns {Object} Returns an instance of AjaxAmbassador object.
	 */
	this.ajaxAmbassador = new AjaxAmbassador();
	
	/**
	 * @constructor
	 * @param {Object} element The $('#wrapper') jQuery DOM reference, containing all adding forms, editing forms, & rest of HTML structure.
	 */
	this.construct = function(element) {
		//construct ambassador class
		self.root = element;
		
		/**
		 * Fires off constructor for AjaxAmbassador object
		 * @param {Object} element The $('#wrapper') jQuery DOM reference, containing all adding forms, editing forms, & rest of HTML structure.
		 * @returns {null} Does not return a value.
		 */
		self.ajaxAmbassador.construct(element);
		
		/**
		 * Fires off internal method #showAddPanel to show/hide the panel used for adding a new contact.
		 * @param {Object} element The $('#wrapper') jQuery DOM reference, containing all adding forms, editing forms, & rest of HTML structure.
		 * @returns {null} Does not return a value.
		 */
		self.showAddPanel(element);
		
		/**
		 * Binds a submit event to the form in the panel used to add a new contact & fires off internal method #addContact
		 */
		$('#addContactForm', element).bind('submit', function() {
			self.addContact(self.root);
			return false;
		});
		
		/**
		 * Fires off internal method #setContactHide for each .contactWidget element in the #interfaceContent area.
		 * @returns {boolean} false.
		 */
		$('#interfaceContent .contactWidget').each(function() {
			self.setContactHide(this);
		});
		
		/**
		 * Binds a submit event for each form element in the #interfaceContent area to fire off the internal method #editContact.
		 * @returns {boolean} false.
		 */
		$('#interfaceContent form').each(function() {
			$(this).bind('submit', function(){
				self.editContact(this);
				return false;
			});
		});
	}
	
	/**
	 * Binds the events to show & hide & toggle the panel used for adding a new contact.
	 * @member InterfaceActions#showAddPanel
	 * @param {Object} element The $('#wrapper') jQuery DOM reference, containing all adding forms, editing forms, & rest of HTML structure.
	 */
	this.showAddPanel = function(element) {
		var addBtn = $("#addBtn", element);
		var addPanel = $("#addContact", element);
		
		addPanel.hide();
		addBtn.toggle(
			function() {
				addPanel.fadeIn("fast");
				$('.contactWidget form').hide();
				$('.contactWidget .contact').fadeIn("fast");
			},
			function() {
				addPanel.fadeOut("fast");
			}
		);
	}
	
	this.setContactHide = function(element) {
		
		$("form", element).hide();
		$(".collapse",element).toggle(function() {
			$('#addContact').hide();
			$('.contactWidget form').hide();
			$('.contactWidget .contact').fadeIn("fast");
				
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