<?php

if(isset($_POST["min"])) {
    $min = $_POST["min"];
}
else $min = 0;
if(isset($_POST["max"])) {

    $max = $_POST["max"];
}
else $max = 0;
if(isset($_POST["array_count"])) {

    $array_count = $_POST["array_count"];
}
else $array_count = 0;

print_r(generate_array($min, $max, $array_count));

function generate_array($min, $max, $count) {
    $arr = array();
    for($i = 0; $i < $count; $i++) {
        $arr[] = mt_rand($min, $max);
    }
    return $arr;
    return $another;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>generate_an_array</title>
    </head>
    <body>
        <form class="" action="#" method="post">
                <?php echo "max: <input type='text' name='min' value='$min'>"; ?>
                <br>
                <?php echo "max: <input type='text' name='max' value='$max'>"; ?>
                <br>
                <?php echo "array_count: <input type='text' name='array_count' value='$array_count'>"; ?>
                <br>

                <button type="submit" name="button">go!</button>
        </form>
    </body>
</html>
