function AjaxAmbassador() {
	var self = this;
	this.root;
	this.sendData;
	this.script;
	
	this.processing = new Processing();
	
	this.construct = function(element) {
		this.processing.construct(element);
	}
	
	//Ajax call to add a contact
	this.makeRequest = function(sendData, script) {
		self.sendData = sendData; 
		self.script = script;
		
		$.ajax({
		  async: true, // default
		  //beforeSend: function() { self.preloader(); },
		  cache: true, // default
		  complete: function(returnData, textStatus) {},
		  contentType: 'application/x-www-form-urlencoded', //default
		  data: self.sendData, 
		  dataFilter: null, //default
		  dataType: 'json',
		  error: function(returnData, textStatus, errorThrown) { alert("SendMessage Ajax broken: " + textStatus);  },
		  global: true, //default
		  ifModified: false, //default
		  success: function(returnData, textStatus) { self.switchProcessing(returnData); },
		  timeout: 10000, // milliseconds
		  url: 'scripts/' + self.script + '.php',
		  type: 'post'
		  
		});
	}
	
	this.switchProcessing = function(returnData) {
		switch(self.script) {
			case "addContact":
				self.processing.addContact(returnData);
				break;
			case "editContact":
				self.processing.editContact(returnData);
				break;
				default:
				break;
		}
	}
	
	this.preloader = function() {
		$('#preloader').html("<img src='images/ajax-loader.gif'/>Loading");
	}
	
	this.complete = function(returnData, textStatus) {
	// $('#preloader').html("");
	}
	
}