<?php

class Patient
{
    public $patientID;
    public $mrn;
    public $name;
    public $firstName;
    public $gender;
    public $birthdate;

    function display() {
       echo $this->firstName.$this->name;
    }

}


