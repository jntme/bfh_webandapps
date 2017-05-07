<?php
  // For the testing of this database, the username and password are the same
  // They are the names of our staff members.

/*if(!isset($_POST['val']) OR !isset($_POST['signID']) OR !isset($_POST['patientID'])){
  include('index.php');
  exit();
 }
 */

session_start();

$MRN = $_POST['MRN'];
$name = $_POST['name'];
$first_name = $_POST['first_name'];

$gender = $_POST['gender'];

$birthdate = $_POST['birthdate']; // (date(Y-m-d))
//$birthdate = new DateTime($_POST['birthdate']);

include('../additional_files/pdo.inc.php');

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/
    // echo 'Connected to database<br />';


    /*** set the error reporting attribute ***/
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*** prepare the SQL statement ***/
    $stmt = $dbh->prepare("INSERT INTO `patient` (`MRN`, `name`, `first_name`, `gender`, `birthdate`) VALUES ( :MRN, :name, :first_name, :gender, :birthdate);");

    /*** bind the paramaters ***/
    
    $stmt->bindParam(':MRN', $MRN, PDO::PARAM_STR,30);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR,30);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR, 30);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_INT,11);
    $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR); //Y-m-d

    /*** execute the prepared statement ***/
    $stmt->execute();

    // redirect to the page home.php
    header('location: ../index.php?state=overview');

    

    /*** close the database connection ***/
    $dbh = null;

    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }



?>