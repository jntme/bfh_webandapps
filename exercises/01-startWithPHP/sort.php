<?php

$my_arr = array();

for($i = 0;$i<100; $i++) {
    $my_arr[] = $i;
}


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
    </div>
</body>
</html>
