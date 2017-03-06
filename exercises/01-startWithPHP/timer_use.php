<?php

include_once("timer.php");

session_start();
if(isset($_SESSION['timer'])) {
    $timer = $_SESSION['timer'];

} else $_SESSION['timer'] = new Timer();

if(isset($_POST["pressed"])) {
    if($_POST["pressed"] == "start") {
        $timer->start();
        echo "Started!";

    } else if($_POST["pressed"] == "stop") {

        echo "Stopped! Elapsed time: ".$timer->stop();

    } else if ($_POST["reset"] = "reset") {

        $timer->reset();
        echo "Resetted!";

    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>timer ftw</title>
    </head>
    <body>
        <form class="" action="#" method="post">
            <button type="submit" name="pressed" value="start">start</button>
            <button type="submit" name="pressed" value="stop">stop</button>
            <button type="submit" name="pressed" value="reset">reset</button>
        </form>
    </body>
</html>
