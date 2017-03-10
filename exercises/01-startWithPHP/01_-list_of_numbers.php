<?php

if (isset($_GET['textfield']) and ($_GET['textfield'] != "")) {
    $number = $_GET['textfield'];

    if (is_numeric($number)) {

        for($i = 1; $i < $number; $i++) {
            echo "- $i";
        }

    }
    else {
        echo "hello";
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list of numbers</title>
</head>
<body>
<form action="#" method="get">
    <input type="text" name="textfield"/>
    <button action="submit">go!</button>
</form>
</body>
</html>
