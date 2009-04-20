function AddressBookApp() {
	var self = this;
	this.root;
	
	this.interfaceActions = new InterfaceActions();
	
	this.construct = function(element) {
		self.root = element;
		self.interfaceActions.construct(self.root);
		
		self.setContactEdit();
		
		this.setContactHide();
	}
	
	this.setContactEdit = function() {
		$('#interfaceContent form').each(function() {
			self.sendData = $(this).serialize();
			self.script = "editContact";
	
			$(this).bind('submit', function(){
				//alert('update widget #' + returnData['data']['id']);
				self.ajaxAmbassador = new AjaxAmbassador();
				self.ajaxAmbassador.makeRequest( self.sendData, self.script );
				return false;
			});
		});
	}
	
	this.setContactHide = function() {
		$('#interfaceContent .contactWidget').each(function() {
			$("form", this).hide();
			$(".collapse",this).toggle(function() {
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
		});
	}
}