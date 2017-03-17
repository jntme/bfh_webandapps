<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>select all vital data of a specific patient</title>
</head>
<body>

<h2>Patients</h2>
<?php

$hostname = "localhost";
$username = "root";
$password = "";

try {
  $dbh = new PDO("mysql:host=$hostname;dbname=medicalinformatics", $username, $password);

  $query = "select * from patient;";

  $stmt = $dbh->query($query);

  while($patient= $stmt->fetch()) {

    //print_r($patient);

    //| staffID | username | name   | first_name | fonctionID | functionID | function_name |
    //echo "<b>first_name:</b> ".$staff['first_name']."<br>";
    //echo "<b>name:</b> ".$staff['name']."<br>";
    echo "<a href='05_patientInfo.php?patID=$patient[patientID]'>".$patient['name']." ".$patient['first_name']."</a>";

    echo "<br>";
  }

}
catch(PDOException $ex) {
  echo $ex;
}
?>
</body>
</html>



