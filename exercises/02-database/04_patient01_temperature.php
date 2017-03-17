<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>selecting staff</title>
</head>
<body>

<?php

$hostname = "localhost";
$username = "root";
$password = "";

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=medicalinformatics", $username, $password);
    
    $query = "select * from staff, function where staff.fonctionID = function.functionID;";

    $stmt = $dbh->query($query);

    while($staff= $stmt->fetch()) {

      //print_r($patient);

      //| staffID | username | name   | first_name | fonctionID | functionID | function_name |
      echo "<b>staffID:</b> ".$staff['staffID']."<br>";
      echo "<b>name:</b> ".$staff['name']."<br>";
      echo "<b>first_name:</b> ".$staff['first_name']."<br>";
      echo "<b>function_name:</b> ".$staff['function_name']."<br>";
      echo "<br>";
    }

}
catch(PDOException $ex) {
  echo $ex;
}
?>
  
</body>
</html>



