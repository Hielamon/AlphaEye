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

function hasClass(element, cName) {
    return !!element.className.match(new RegExp("(\\s|^)" + cName + "(\\s|$)"));
}

function addClass(element, cName) {
    if(!hasClass(element, cName)){
        element.className += " " + cName;
    }
}

function removeClass(element, cName) {
    if(hasClass(element, cName)){
        element.className = element.className.replace(new RegExp("(\\s|^)" + cName + "(\\s|$)"));
    }
}


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

//node is a JQuery Node , text is the warning text which add after the node
function addWarning(node, text, borderColor) {
//            alert(text);
    var waringTag = $("<span></span>").text(text);
    waringTag.css({"color" : "#CC3333", "position": "absolute", "font-size" : "0.7rem"});
    node.after(waringTag);
    if(arguments.length >= 3){
        node.css("border-color" , borderColor);
    }
}

function addWarningInner(node, text, align) {
    var waringTag = $("<span></span>").text(text);
    waringTag.css({"color" : "#CC3333", "position": "absolute"});
    if(arguments.length >= 3){
        waringTag.css("text-align", align);
    }

    waringTag.css("line-height", node.css("line-height"));
    waringTag.css("pointer-events", "none");
    node.css("border-color" , "red");

    var paddingLeft = parseFloat(node.css("padding-left"));
    var paddingTop = parseFloat(node.css("padding-top"));
    var borderWidth = parseFloat(node.css("border-width"));
    if(isNaN(borderWidth)){
        borderWidth = 0;
    }

    var leftDistant = paddingLeft;
    leftDistant += borderWidth;
    leftDistant += parseFloat(node.css("margin-left"));
    leftDistant += parseFloat(node.parent().css("padding-left"));

    var topDistant = paddingTop;
    topDistant += borderWidth;
    topDistant += parseFloat(node.css("margin-top"));
    topDistant += parseFloat(node.parent().css("padding-top"));

    var waringWidth = parseFloat(node.css("width"));
    waringWidth -= (2 * borderWidth);
    waringWidth -= (2 * paddingLeft);
    waringTag.css("width", (waringWidth + "px"));

    waringTag.css("left", (leftDistant + "px"));
    waringTag.css("top", (topDistant + "px"));

    node.after(waringTag);
}

function removeWarningHandler(event) {
    event = EventUtil.getEvent(event);
    var target = EventUtil.getTarget(event);
    $(target).siblings("span").remove();
}

function removeWarningColorHandler(event) {
    event = EventUtil.getEvent(event);
    var target = EventUtil.getTarget(event);
    target.style.borderColor = "#80bdff";
    $(target).siblings("span").remove();
}
