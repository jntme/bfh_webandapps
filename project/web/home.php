<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">    
<?php

 session_start();

// Test if the user is logged in.
// If no : back to the login page!
if(!isset($_SESSION['staffID'])){
  header('location: index.php');
  exit;
 }


include('../additional_files/pdo.inc.php');

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    echo "<a href='logout.php'>Logout</a><br>\n";

    echo "<h1>".$_SESSION['first_name']." ".$_SESSION['name']."</h1>\n";

    /*** echo a message saying we have connected ***/
    echo '<h3>List of patients</h3>';
    $sql = "select * from patient";

    $result = $dbh->query($sql);

    echo "<ul class='list-group container col-md-3'>";
    while($line = $result->fetch()){
      echo "<li class='list-group-item'>";
      echo "<a href='patient.php?id=".$line['patientID']."'>";
      echo $line['first_name']." ".$line['name'];

      echo "</a><br>\n";
      echo "</li>";
    }

    echo "</ul>";
    
    $dbh = null;
}
catch(PDOException $e)
{

    /*** echo the sql statement and error message ***/
    echo $e->getMessage();
}


?> 
</div>
</body>
</html>