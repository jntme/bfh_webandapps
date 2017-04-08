<?php

print_r($_POST);

if(!isset($_POST['quantity']) OR !isset($_POST['physID']) OR !isset($_POST['medicamentID']) OR !isset($_POST['nurseID']))  {
  include('../index.php');
  exit();
 }

session_start();
$quantity = $_POST['quantity'];
$medicamentID= (int)$_POST['medicamentID'];
$patientID = (int)$_POST['patientID'];
$physID = (int)$_POST['physID'];
$nurseID = (int)$_POST['nurseID'];
$note = $_POST['note'];

include('../additional_files/pdo.inc.php');

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/
    // echo 'Connected to database<br />';


    /*** set the error reporting attribute ***/
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*** prepare the SQL statement ***/
    $stmt = $dbh->prepare("INSERT INTO `medicine` (`medicineID`, `patientID`, `medicamentID`, `staffID_nurse`, `staffID_physician`, `quantity`, `time`, `note`) VALUES (NULL, :patientID, :medicamentID, :staffID_nurse,
                                                    :staffID_physician, :quantity, CURRENT_TIMESTAMP, :note);");

    /*** bind the paramaters ***/
    $stmt->bindParam(':patientID', $patientID, PDO::PARAM_INT);
    $stmt->bindParam(':medicamentID', $medicamentID, PDO::PARAM_INT);
    $stmt->bindParam(':staffID_nurse', $nurseID, PDO::PARAM_INT);
    $stmt->bindParam(':staffID_physician', $physID, PDO::PARAM_INT);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindParam(':note', $note, PDO::PARAM_STR, 5);

    /*** execute the prepared statement ***/
    $stmt->execute();

    // redirect to the page home.php
    header('location: ../index.php?state=medicine&id='.$patientID);

    

    /*** close the database connection ***/
    $dbh = null;

    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }



?>