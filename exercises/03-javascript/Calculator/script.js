var operation;

window.onload = function() {
    var calcField = document.getElementById('calcfield'); 
    var btnList = document.getElementsByClassName('numberbutton');

    btnList = Array.from(btnList);
    btnList.forEach(function(entry) {
       var newp = document.createElement('p');
        entry.addEventListener("click", getNumberFunction(entry.innerHTML));
    });
}

function getNumberFunction(sign) {
    return function() {
        var calcField = document.getElementById('calcfield'); 
        calcField.innerHTML += number;
        var patt = new RegExp("[\*\+-\/]");
        var res = patt.test(number)
        
    }
}