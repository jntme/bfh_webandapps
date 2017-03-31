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
    echo "<a href='logout.php'>Logout</a><br>\n";

    echo "<h1>Homepage of ".$_SESSION['first_name']." ".$_SESSION['name']."</h1>\n";

    /*** echo a message saying we have connected ***/
    echo '<h3>List of patients</h3>';
    $sql = "select * from patient";

    $result = $dbh->query($sql);

    while($line = $result->fetch()){
      echo "<a href='patient.php?id=".$line['patientID']."'>";
      echo $line['first_name']." ".$line['name'];

      echo "</a><br>\n";
    }

    $dbh = null;
}
catch(PDOException $e)
{

    /*** echo the sql statement and error message ***/
    echo $e->getMessage();
}


?> 