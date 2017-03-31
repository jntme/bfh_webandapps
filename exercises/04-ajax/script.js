
var arr1 = ['one', 'two', 'three'];
var obj1 = {
    "PID": 123,
    "name": "doe",
    "prename": "john"
}

document.write(obj1.PID);

function showCustomer() {
    xmlHttp = GetXmlHttpObject(); if (xmlHttp == null) {
        alert('Your browser does not support AJAX!');
        return;
    }

    var url = 'getpatient.php';
    url = url + '?q =' + 123; url = url + '&pid=' + Math.random();
    xmlHttp.onreadystatechange = stateChanged;
    xmlHttp.open('GET', url, true);
    xmlHttp.send(null);
}

function stateChanged() {
    if (xmlHttp.readyState == 4) {
        document.getElementById('txtHint').innerHTML = xmlHttp.responseText;
    }
}

function GetXmlHttpObject() {
    var xmlHttp = null;
    try { // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e) { // Internet Explorer
        try {
            xmlHttp = new ActiveXObject('Msxml2.XMLHTTP');
        }
        catch (e) {
            xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
    }
    return xmlHttp;
}