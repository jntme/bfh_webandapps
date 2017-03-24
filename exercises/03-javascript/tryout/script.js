function square() {
    var result = document.getElementsByName("number")[0];

    alert(result);
    result.value = "test";
}

function showAction() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");

    ctx.beginPath();
    ctx.arc(95,50,40,0,2*Math.PI);
    ctx.stroke();
}

function clearCanvas() {
    var c = document.getElementById("myCanvas");
    var context = c.getContext('2d');
    context.clearRect(0, 0, c.width, c.height);
}