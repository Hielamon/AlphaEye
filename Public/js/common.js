var EventUtil = {
  addHandler: function (element, type, handler) {
    if (element.addEventListener) {
      element.addEventListener(type, handler, false);
    } else if (element.attachEvent){
      element.attachEvent("on" + type, handler);
    }else {
      element["on" + type] = type;
    }
  },

  removeHandler: function (element, type, handler) {
    if (element.removeEventListener){
      element.removeEventListener(type, handler, false);
    } else if (element.detachEvent){
      element.detachEvent("on" + type, handler);
    } else {
      element["on" + type] = null;
    }
  },

  getEvent : function (event) {
    return event ?  event : window.event;
  },

  getTarget : function (event) {
    return event.target || event.srcElement;
  },

  preventDefault : function (event) {
    if (event.preventDefault){
      event.preventDefault();
    } else {
      event.returnValue = false;
    }
  },

  stopPropagation : function (event) {
    if (event.stopPropagation){
      event.stopPropagation();
    } else {
      event.cancelBubble();
    }
  },

};

function findLableForControl(root, el) {
  var idVal = el.id;
  labels = root.getElementsByTagName('label');
  for( var i = 0; i < labels.length; i++ ) {
    if (labels[i].htmlFor === idVal)
      return labels[i];
  }
  if(i === labels.length){
    return false;
  }
}

function createXHR() {
  if(typeof XMLHttpRequest !== "undefined"){
      return new XMLHttpRequest();
  }else if(typeof ActiveXObject !== "undefined"){
    if(typeof arguments.callee.activeXString !== "string"){
      var versions = ["MSXML2.XMLHttp.6.0", "MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp"], i, len;
      for(i = 0, len=versions.length; i < len; i++){
        try{
          new ActiveXObject((versions[i]));
          arguments.callee.activeXString = versions[i]
        }catch(ex){
          //skip
        }
      }
    }
    return new ActiveXObject(arguments.callee.activeXString);
  }else{
    throw new Error("No XHR object available.");
  }
}
