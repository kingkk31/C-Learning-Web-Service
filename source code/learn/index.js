function insertTab(obj, event){
	if(event.keyCode == 9){
		var val = obj.value, start = obj.selectionStart, end = obj.selectionEnd;
        obj.value = val.substring(0, start) + '\t' + val.substring(end);
        obj.selectionStart = obj.selectionEnd = start + 1;
        event.returnValue = false;
	}
}

function compFormPost(frmObj) {
	var str = '';
    var elm;
    var endName = '';
    for (i = 0, k = frmObj.length; i < k; i++) {
    	elm = frmObj[i];
        switch (elm.type) {
        	case 'text':
        	case 'hidden':
            case 'password':
            case 'textarea':
            case 'select-one':
            	str += elm.name + '=' + encodeURIComponent(elm.value) + '&';
                break;
            case 'select-multiple':
                sElm = elm.options;
                str += elm.name + '='
                for (x = 0, z = sElm.length; x < z; x++) {
                	if (sElm[x].selected) {
                		str += encodeURIComponent(sElm[x].value) + ',';
                    }
                }
                str = str.substr(0, str.length - 1) + '&';
                break;
            case 'radio':
            	if (elm.checked) {
            		str += elm.name + '=' + encodeURIComponent(elm.value) + '&';
                }
                break;
            case 'checkbox':
            	if (elm.checked) {
            		if (elm.name == endName) {
            			if (str.lastIndexOf('&') == str.length - 1) {
            				str = str.substr(0, str.length - 1);
                        }
                        str += ',' + encodeURIComponent(elm.value);
                    }
            		else {
                    	str += elm.name + '=' + encodeURIComponent(elm.value);
                    }
                    str += '&';
                    endName = elm.name;
                }
                break;
        }
    }
    return str.substr(0, str.length - 1);
}

function insertTxt(){
	var content = document.getElementById("form");
    var param = compFormPost(content);
    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
    	if (request.readyState == 4){
        	if (request.status == 200){
            	document.getElementById("txtHint").innerHTML = request.responseText;
            }
        	else if (xmlHttp.status == 400){
        		alert("404 Error : " + request.responseText);
            }
        }
    };

    request.open("POST", "compile.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
    request.setRequestHeader("Cache-Control", "no-cache, must-revalidate");
    request.setRequestHeader("Pragma", "no-cache");
    request.send(param);
}
