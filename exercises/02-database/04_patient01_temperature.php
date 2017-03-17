<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>select all vital data of a specific patient</title>
</head>
<body>

<?php

$hostname = "localhost";
$username = "root";
$password = "";

try {
  $dbh = new PDO("mysql:host=$hostname;dbname=medicalinformatics", $username, $password);

  $query = "select patient.first_name, patient.name, sign.sign_name, vital_sign.value from patient, vital_sign, sign where patient.patientID = vital_sign.patientID and vital_sign.signID= sign.signID;";

  $stmt = $dbh->query($query);

  while($staff= $stmt->fetch()) {

    //print_r($patient);

    //| staffID | username | name   | first_name | fonctionID | functionID | function_name |
    echo "<b>first_name:</b> ".$staff['first_name']."<br>";
    echo "<b>name:</b> ".$staff['name']."<br>";
    echo "<b>sign_name:</b> ".$staff['sign_name']."<br>";
    echo "<b>value:</b> ".$staff['value']."<br>";
    echo "<br>";
  }

}
catch(PDOException $ex) {
  echo $ex;
}
?>

</body>
</html>



