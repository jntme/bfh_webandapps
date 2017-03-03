<?php

session_start();

if(!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}
else {
    $_SESSION['count'] += 1;
}

echo 'Yu visit for the '.$_SESSION['count'].' time!';

$_SESSION['favcolor'] = 'green';
$_SESSION['animal'] = 'cat';
$_SESSION['time'] = time();


 ?>
