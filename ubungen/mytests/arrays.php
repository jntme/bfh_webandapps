
<?php

$arrayD = array();

$arrayD[] = 'Hello';
$arrayD[] = 'World';

$arrayD[5] = 'Five';


//print_r($arrayD);

foreach($arrayD as $i) {
    echo $i;
}

echo isset($arrayD);?>
