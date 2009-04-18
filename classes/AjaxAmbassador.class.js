function AjaxAmbassador() {
  var self = this;
  this.root;
  this.dataObject;
  this.script;
  
  this.construct = function(dataObject, script) {
    self.dataObject = dataObject; 
    self.script = script;  
    self.makeRequest();
  }
  
  this.makeRequest = function() {
    $.ajax({
      async: true, // default
      beforeSend: function() { self.preloader(); },
      cache: true, // default
      complete: function(returnData, textStatus) { self.complete(returnData, textStatus); },
      contentType: 'application/x-www-form-urlencoded', //default
      data: "id=" + id + "&receiver=" + receiver + "&message=" + message, 
      dataFilter: null, //default
      dataType: 'json',
      error: function(returnData, textStatus, errorThrown) { alert("SendMessage Ajax broken: " + textStatus) },
      global: true, //default
      ifModified: false, //default
      success: function(data, textStatus) { self.success(data, textStatus); },
      timeout: 10000, // milliseconds
      url: self.script + '.php',
      type: 'post'
      
    });
 
  }
  
  this.preloader = function() {
    //$('#preloader').html("<img src='images/ajax-loader.gif'/>Loading");
  }
  
  this.success = function(data, textStatus) {
    //Set data variable to be returned
    self.data = data;
    self.handleData(self.data);
  }
  
  this.complete = function(data, textStatus) {
    //$('#preloader').html("");
  }
  
  this.returnData = function() {
    //Return data
    return self.data;
  }
  
  this.handleData = function(data) {
    soundManager.play('correct');
    
    this.renderMessages = new RenderMessages();
    this.renderMessages.construct(data['message']['new']['id'], data['message']['new']['sender'], data['message']['new']['message'], data['message']['new']['time']);
 
  }
}