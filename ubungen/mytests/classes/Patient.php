<?php

class Patient {

    var $prename;
    var $surname;

    //constructor has always to be written with __
    function __construct($prename, $surname) {
        $this->prename = $prename;
        $this->surname = $surname;
    }

    function printFullName() {
        echo $this->prename." ".$this->surname;
    }
}
?>
