<?php

include_once("timer.php");

$size = 100;

$timer = new Timer();

for($i = 0;$i<$size; $i++) {
    $my_arr[] = $i;
}

$timer->start();
sort($my_arr);
$duration = $timer->stop();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>measuring sort</title>
</head>
<body>
    <header><h1>measure of sort()</h1></header>
    <div>
<?php
print_r($my_arr);
?>
    <p>The process to sort an array (<?=$size?>x<?=$size?>) took <?php echo number_format($duration, 5, ".", "'")."s.";?></p>
    </div>
</body>
</html>
