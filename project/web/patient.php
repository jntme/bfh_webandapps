<?php
 session_start();

// Test if the user is logged in.
// If no : back to the login page!
if(!isset($_SESSION['staffID'])){
  header('location: index.php');
  exit;
 }


include('pdo.inc.php');

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $patientID = (int)($_GET[id]);
    if($patientID >0){

      $sql0 = "SELECT name, first_name
  FROM patient
  WHERE patient.patientID = :patientID";

    $statement0 = $dbh->prepare($sql0);
    $statement0->bindParam(':patientID', $patientID, PDO::PARAM_INT);
    $result0 = $statement0->execute();


    echo "<a href='logout.php'>Logout</a><br>\n";
    while($line = $statement0->fetch()){
      
      echo "<h1> Patient : ".$line['first_name']."  ".$line['name']."</h1>";

      echo "<br>\n";
    }


      /*** echo a message saying we have connected ***/
      $sql = "SELECT name, first_name, value, time, sign_name
  FROM patient, vital_sign, sign
  WHERE patient.patientID = vital_sign.patientID
    AND vital_sign.signID = sign.signID 
    AND patient.patientID = :patientID";

    $statement = $dbh->prepare($sql);
    $statement->bindParam(':patientID', $patientID, PDO::PARAM_INT);
    $result = $statement->execute();

    while($line = $statement->fetch()){
      echo $line['sign_name']." = ".$line['value']. " at ".$line['time'];

      echo "<br>\n";
    }


    echo "<h3>Insert new vital sign</h3>\n";
    echo "<form action='addsign.php' method='POST'>\n";
    echo "<input type='hidden' name='patientID' value='$patientID'>\n";
    echo "<select name='signID'>\n";
   $sql = "SELECT * FROM sign";

    $statement = $dbh->prepare($sql);
    $result = $statement->execute();

    while($line = $statement->fetch()){
      echo "<option value='".$line['signID']."'>".$line['sign_name']."</option>\n";

     
    }
    echo "</select><br>";
    echo "Value : <input type='text' name='val'><br>\n";
    echo "Note <textarea name='note'></textarea>";
    echo "<input type='submit' value='Add sign'></form>";


    }
    else{
      echo "<h1>The patient does not exist</h1>";
    }

    $dbh = null;
}
catch(PDOException $e)
{

    /*** echo the sql statement and error message ***/
    echo $e->getMessage();
}


?> 