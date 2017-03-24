function square() {
    var result = document.form.number.value;

    alert(result);
}

function showAction() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    ctx.font = "30px Arial";
    ctx.fillText("Hello World",10,50);
}

alert("hello world!");
